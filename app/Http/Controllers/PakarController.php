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
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "gelar" => "required",
            "email" => "required|unique:users",
//            "address" => "required",
            "kecamatan" => "required",
            "kabupaten" => "required",
            "provinsi" => "required",
            "password" => "required|string|min:8|max:8|confirmed",
            "password_confirmation" => "required|same:password",
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
