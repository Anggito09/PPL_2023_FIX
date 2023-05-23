<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
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
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "email" => "required|unique:users",
            "password" => "required|confirmed",
            "password_confirmation" => "required|same:password",
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
        $status = [];
        foreach ($petanis as $petani){
            foreach ($petani->transaksi as $transaksi){
                if (Carbon::now()->diffInDays($transaksi->created_at) < $transaksi->paket->durasi && $transaksi->status) {
                    array_push($status, true);
                    break;
                }
            }
        }
        return view("admin.list.petani", ["petanis" => $petanis, "status"=>$status]);
    }

    public function listinvestor()
    {
        $investors = User::where("role_id", Role::where("role_name", "investor")->first()->id)->get();
        $status = [];
        foreach ($investors as $investor){
            foreach ($investor->transaksi as $transaksi){
                if (Carbon::now()->diffInDays($transaksi->created_at) < $transaksi->paket->durasi && $transaksi->status) {
                    array_push($status, true);
                    break;
                }
            }
        }
        return view("admin.list.investor", ["investors" => $investors, "status"=>$status]);
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
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "email" => "required|unique:users,email," . $user->id,
            "kecamatan" => "required",
            "kabupaten" => "required",
            "provinsi" => "required","rekening" => "required",
            "password" => "nullable|confirmed",
            "password_confirmation" => "nullable|same:password",
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
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "email" => "required|unique:users,email," . $user->id,
            "kecamatan" => "required",
            "kabupaten" => "required",
            "provinsi" => "required","rekening" => "required",
            "password" => "nullable|confirmed",
            "password_confirmation" => "nullable|same:password",
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
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "gelar" => "required",
            "email" => "required|unique:users,email,".$user->id,
            "kecamatan" => "required",
            "kabupaten" => "required",
            "provinsi" => "required","password" => "nullable|confirmed",
            "password_confirmation" => "nullable|same:password",
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


