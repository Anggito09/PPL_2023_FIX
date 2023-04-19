<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            Session::put("auth", Auth::user());
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
        }
    }

    public function signinform()
    {
        return $this->render("auth.login");
//        return View::make("auth.login", ["auth"=>Session::get("auth")]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $data["password"] = Hash::make($data["password"]);
        $data["role_id"] = role::firstWhere("role_name", "customer")->id;
        $user = new User($data);
        $user->save();
        Auth::login($user);
        Session::put("auth", $user);
        return redirect()->intended();
    }

    public function registerform()
    {
        Session::regenerate();
        return View::make("auth.register", ["auth" => Session::get("auth")]);
    }

    public function registerpakar(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gelar' => 'required'
        ]);
        $data["password"] = Hash::make($data["password"]);
        $data["role_id"] = role::firstWhere("role_name", "pakar")->id;
        $user = new User($data);
        $user->save();
        Auth::login($user);
        Session::put("auth", $user);
        return redirect()->intended();
    }

    public function registerpakarform()
    {
        Session::regenerate();
        return View::make("auth.registerpakar", ["auth" => Session::get("auth")]);
    }

    public function logout()
    {
        Auth::logout();
        Session::forget("auth");
        return redirect()->intended();
    }
}
