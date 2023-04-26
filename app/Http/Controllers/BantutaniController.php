<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use App\Models\Tani;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BantutaniController extends Controller
{
    public function daftartaniform()
    {
        return view("bantutani.tani.register");
    }

    public function daftartani(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "phone" => "required",
            "descpetani" => "required",
            "desclahan" => "required",
            "fund" => "required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $tani = new Tani($data);
        $tani->save();
        return redirect("/bantutani");
    }

    public function investasiform()
    {
        $petanis = Tani::all();
        return view("bantutani.investasi.register", ["petanis" => $petanis]);
    }

    public function investasi(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "phone" => "required",
            "fund" => "required",
            "tani_id" => "required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $request->session()->put("investasipayload", $data);
        return view("bantutani.investasi.confirm");
    }

    public function investasiconfirm(Request $request)
    {
        $data = $request->session()->get("investasipayload");
        if ($data) {
            $investasi = new Investasi($data);
            $investasi->save();
            $request->session()->forget("investasipayload");
        } else {
            return redirect("/investasi");
        }
        return redirect("https://wa.me/6282340968471");
    }

    public function listbantutani()
    {
        $tanis = Auth::user()->tani;
        return view("petani.bantutani", ["tanis" => $tanis]);
    }

    public function listinvestasi()
    {
        if (Auth::user()->role->role_name === "petani") {
            $investasis = Auth::user()->investor;
            return view("petani.transaksi", ["investasis" => $investasis]);
        } else if (Auth::user()->role->role_name === "investor") {
            $investasis = Auth::user()->investasi;
            return view("investor.transaksi", ["investasis" => $investasis]);
        } else if (Auth::user()->role->role_name === "admin") {
            $investasis = Investasi::all();
            return view("admin.listinvestasi", ["investasis" => $investasis]);
        }
    }
    public function confirminvestasi($id)
    {
        $investasi = Investasi::find($id);
        $investasi->confirmed = !$investasi->confirmed;
        $investasi->save();
        return back();
    }

    public function index()
    {
        if (Auth::user()->role->role_name === "investor") {
            return view("bantutani.investasi.index");
        } else if (Auth::user()->role->role_name === "petani") {
            return view("bantutani.tani.index");
        } else if (Auth::user()->role->role_name === "admin") {
            $investasis = Investasi::all();
            return view("bantutani.admin", ["investasis" => $investasis]);
        }
    }
}
