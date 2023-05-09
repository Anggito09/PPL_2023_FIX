<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function loginform()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            "email" => "required|exists:users",
            "password" => "required"
        ]);
        if (Auth::attempt($credential)) {
            Auth::login(Auth::user());
            return redirect()->intended();
        }
        return back()->withErrors(["password" => "Password salah"]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }

    public function editprofileform()
    {
        if (Auth::user()->role->role_name === "pakar") {
            return view("pakar.editprofile");
        } else if (Auth::user()->role->role_name === "investor") {
            return view("investor.editprofile");
        } else if (Auth::user()->role->role_name === "petani") {
            return view("petani.editprofile");
        } else if (Auth::user()->role->role_name === "admin") {
            return view("admin.editprofile");
        }
        return redirect()->intended();
    }

    public function editprofile(Request $request)
    {
        $biodata = [];
        if (Auth::user()->role->role_name === "pakar") {
            $biodata = $request->validate([
                "name" => "required",
                "gender" => "required",
                "phone" => "required|regex:/(08)[0-9]{10}/",
                "gelar" => "required",
                "email" => "required|unique:users,email," . Auth::user()->id,
                "kecamatan" => "required",
                "kabupaten" => "required",
                "provinsi" => "required", "npwp" => "required",
                "password" => "nullable|confirmed",
                "password_confirmation" => "nullable|same:password",
                "dp" => "nullable"
            ]);
        } else if (Auth::user()->role->role_name === "investor" || Auth::user()->role->role_name === "petani") {
            $biodata = $request->validate([
                "name" => "required",
                "gender" => "required",
                "phone" => "required|regex:/(08)[0-9]{10}/",
                "email" => "required|unique:users,email," . Auth::user()->id,
                "kecamatan" => "required",
                "kabupaten" => "required",
                "provinsi" => "required", "rekening" => "nullable",
                "password" => "nullable|confirmed",
                "password_confirmation" => "nullable|same:password",
                "dp" => "nullable"
            ]);
        } else if (Auth::user()->role->role_name === "admin") {
            $biodata = $request->validate([
                "name" => "required",
                "phone" => "required|regex:/(08)[0-9]{10}/",
                "email" => "required|unique:users,email," . Auth::user()->id,
                "password" => "nullable|confirmed",
                "password_confirmation" => "nullable|same:password",
                "dp" => "nullable"
            ]);
        }
        $file = $request->file("dp");
        if ($file) {
            $filename = Storage::put("dp", $file);
            $biodata["dp"] = $filename;
        }
        $biodata["password"] = Hash::make($biodata["password"]);
        Auth::user()->update($biodata);
        return redirect("/me");
    }

    public function profile()
    {
        if (Auth::user()->role->role_name === "pakar") {
            return view("pakar.profile");
        } else if (Auth::user()->role->role_name === "investor") {
            return view("investor.profile");
        } else if (Auth::user()->role->role_name === "petani") {
            return view("petani.profile");
        } else if (Auth::user()->role->role_name === "admin") {
            return view("admin.profile");
        }
        return redirect()->intended();
    }
}
