<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use App\Models\Tani;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "descpetani" => "required",
            "desclahan" => "required",
            "fund" => "required",
            "docs" => "required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $berkaspendukung = $request->file("docs");
        $data["file"] = "." . $berkaspendukung->getClientOriginalExtension();
        $tani = new Tani($data);
        $tani->save();
        $berkaspendukung?->storeAs('public/petani' . $tani->id . "." . $berkaspendukung->getClientOriginalExtension());
        return redirect("/bantutani");
    }

    public function investasiform()
    {
        $petanis = Tani::all();
        Storage::delete("public/investasi" . Auth::user()->id . ".temp");
        return view("bantutani.investasi.register", ["petanis" => $petanis]);
    }

    public function investasi(Request $request)
    {
        $request->validate([
            "name" => "required",
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "fund" => "required",
            "tani_id" => "required",
            "docs" => "required"
        ]);
        $data = $request->validate([
            "name" => "required",
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "fund" => "required",
            "tani_id" => "required",
        ]);
        $data["user_id"] = Auth::user()->id;
        $berkaspendukung = $request->file("docs");
        $data["file"] = "." . $berkaspendukung->getClientOriginalExtension();
        $berkaspendukung?->storeAs('public/investasi' . Auth::user()->id . ".temp");
        $request->session()->put("investasipayload", $data);
        return view("bantutani.investasi.confirm");
    }

    public function investasiconfirm(Request $request)
    {
        $data = $request->session()->get("investasipayload");
        if ($data) {
            $investasi = new Investasi($data);
            $investasi->save();
            Storage::move("public/investasi" . Auth::user()->id . ".temp", "public/investasi" . $investasi->id . $data["file"]);
            $request->session()->forget("investasipayload");
        } else {
            return redirect("/investasi");
        }
        return redirect("https://wa.me/62895324404095");
    }

    public function listbantutani()
    {
        if (Auth::user()->role->role_name === "petani") {
            $tanis = Auth::user()->tani;
            return view("petani.bantutani", ["tanis" => $tanis]);
        } else if (Auth::user()->role->role_name === "pakar") {
            $tanis = Tani::all();
            return view("pakar.bantutani", ["tanis" => $tanis]);
        }
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

    public function fileberkaspendukung($id)
    {
        $data = Investasi::find($id);
        return view("fileloader", ["file" => "/storage/investasi" . $data->id . $data->file]);
    }

    public function filebantutani($id)
    {
        $data = Tani::find($id);
        return response()->file(storage_path("app/public/petani" . $data->id . $data->file));
    }

    public function detailbantutani($id)
    {
        $tani = Tani::find($id);
        return view("bantutani/tani/detail", ["tani" => $tani]);
    }

    public function edittaniform($id)
    {
        $tani = Tani::find($id);
        return view("bantutani/tani/edit", ["tani" => $tani]);
    }

    public function edittani($id, Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "phone" => "required|regex:/(08)[0-9]{10}/",
            "descpetani" => "required",
            "desclahan" => "required",
            "fund" => "required",
            "docs" => "nullable"
        ]);
        $data["user_id"] = Auth::user()->id;
        $berkaspendukung = $request->file("docs");
        if ($berkaspendukung) {
            $data["file"] = "." . $berkaspendukung->getClientOriginalExtension();
        }
        $tani = Tani::find($id);
        $tani->update($data);
        $tani->save();
        $berkaspendukung?->storeAs('public/petani' . $tani->id . "." . $berkaspendukung->getClientOriginalExtension());
        return redirect("/bantutani/$id");
    }
}
