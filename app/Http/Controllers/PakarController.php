<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PakarController extends Controller
{
    public function registerform()
    {
        return view("pakar.register");
    }

    public function register(Request $request)
    {
        $biodata = $request->validate([
            "name" => "required",
            "gender" => "required",
            "phone" => "required",
            "gelar" => "required",
            "email" => "required|unique:users",
            "address" => "required",
            "password" => "required|confirmed",
            "npwp" => "required",
        ]);
        $biodata["password"] = Hash::make($biodata["password"]);
        $biodata["role_id"] = Role::where("role_name", "pakar")->first()->id;
        $user = new User($biodata);
        $user->save();
        Auth::login($user);
        return redirect()->intended();
    }
}
