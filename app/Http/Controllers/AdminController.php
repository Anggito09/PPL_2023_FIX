<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function registerform()
    {
        return view("admin.register");
    }

    public function register(Request $request)
    {
        $biodata = $request->validate([
            "name" => "required",
            "phone" => "required",
            "email" => "required|unique:users",
            "password" => "required|confirmed",
        ]);
        $biodata["password"] = Hash::make($biodata["password"]);
        $biodata["role_id"] = Role::where("role_name", "admin")->first()->id;
        $user = new User($biodata);
        $user->save();
        Auth::login($user);
        return redirect()->intended();
    }

    public function listpetani()
    {
        $petanis = User::where("role_id", Role::where("role_name", "petani")->first()->id)->get();
        return view("admin.list.petani", ["petanis" => $petanis]);
    }

    public function listinvestor()
    {
        $investors = User::where("role_id", Role::where("role_name", "investor")->first()->id)->get();
        return view("admin.list.investor", ["investors" => $investors]);
    }

    public function listpakar()
    {
        $pakar = User::where("role_id", Role::where("role_name", "pakar")->first()->id)->get();
        return view("admin.list.pakar", ["pakars" => $pakar]);
    }

    public function editpetaniform($id)
    {
        $petani = User::find($id);
        return view("admin.edit.petani", ["petani" => $petani]);
    }

    public function editpetani($id, Request $request)
    {
        $user = User::find($id);
        $biodata = $request->validate([
            "name" => "required",
            "gender" => "required",
            "phone" => "required",
            "email" => "required|unique:users,email," . $user->id,
            "address" => "required",
            "rekening" => "nullable",
            "password" => "nullable|confirmed",
//            "premium" => "nullable"
        ]);
        if ($biodata["password"]) {
            $biodata["password"] = Hash::make($biodata["password"]);
        }else{
            $biodata["password"] = $user->password;
        }
        if($request->has("premium")){
            $biodata["premium"] = true;
        }else{
            $biodata["premium"] = false;
        }
        $user->update($biodata);
        return redirect("/akunpetani");
    }

    public function editinvestorform($id)
    {
        $investor = User::find($id);
        return view("admin.edit.investor", ["investor" => $investor]);
    }

    public function editinvestor($id, Request $request)
    {
        $user = User::find($id);
        $biodata = $request->validate([
            "name" => "required",
            "gender" => "required",
            "phone" => "required",
            "email" => "required|unique:users,email," . $user->id,
            "address" => "required",
            "rekening" => "nullable",
            "password" => "nullable|confirmed",
        ]);
        if ($biodata["password"]) {
            $biodata["password"] = Hash::make($biodata["password"]);
        }else{
            $biodata["password"] = $user->password;
        }
        $user->update($biodata);
        return redirect("/akuninvestor");
    }

    public function editpakarform($id)
    {
        $pakar = User::find($id);
        return view("admin.edit.pakar", ["pakar" => $pakar]);
    }

    public function editpakar($id, Request $request)
    {
        $user = User::find($id);
        $biodata = $request->validate([
            "name" => "required",
            "gender" => "required",
            "phone" => "required",
            "gelar" => "required",
            "email" => "required|unique:users,email,".$user->id,
            "address" => "required",
            "password" => "nullable|confirmed",
            "npwp" => "required",
        ]);
        if ($biodata["password"]) {
            $biodata["password"] = Hash::make($biodata["password"]);
        }else{
            $biodata["password"] = $user->password;
        }
        $user->update($biodata);
        return redirect("/akunpakar");
    }
}
