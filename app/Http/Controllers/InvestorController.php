<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InvestorController extends Controller
{
    public function registerform()
    {
        return view("investor.register");
    }

    public function register(Request $request)
    {
        $biodata = $request->validate([
            "name" => "required",
            "gender" => "required",
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "email" => "required|unique:users",
            "kecamatan" => "required",
            "kabupaten" => "required",
            "provinsi" => "required",
            "password" => "required|string|min:8|max:8|confirmed",
            "password_confirmation" => "required|same:password",
            "rekening" => "required"
        ]);
        $biodata["password"] = Hash::make($biodata["password"]);
        $biodata["role_id"] = Role::where("role_name", "investor")->first()->id;
        $user = new User($biodata);
        $user->save();
        Auth::login($user);
        return redirect()->intended();
    }

}
