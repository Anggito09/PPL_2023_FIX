<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatSession;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;

class DiskusiController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role->role_name === "admin") {
            $transaksis = Transaksi::all();
            return view("diskusi.admin_aktivasi", ["transaksis" => $transaksis]);
        } else {
            $page = $request->get("page");
            $gelar = $request->get("gelar");
            if ($gelar) {
                $pakars = User::with("role")->whereHas("role", function ($q) {
                    $q->where("role_name", "pakar");
                })->where("gelar", $gelar)->offset(($page - 1) * 8)->limit(8)->get();
            } else {
                $pakars = User::with("role")->whereHas("role", function ($q) {
                    $q->where("role_name", "pakar");
                })->offset(($page - 1) * 8)->limit(8)->get();
            }
            $n = ceil(User::with("role")->whereHas("role", function ($q) {
                    $q->where("role_name", "pakar");
                })->count() / 8);
            $transaksis = Auth::user()->transaksi;
            $active = false;
            foreach ($transaksis as $transaksi) {
                if (Carbon::now()->diffInDays($transaksi->created_at) < $transaksi->paket->durasi && $transaksi->status) {
                    $active = true;
                    break;
                }
            }
            return view("diskusi.index", ["page" => $page, "pakars" => $pakars, "n" => $n, "gelar" => $gelar, "active" => $active]);
        }
    }

    public function pricelist()
    {
        $pakets = Paket::all();
        return view("diskusi.pricelist", ["pakets" => $pakets]);
    }

    public function createPremium(Request $request)
    {
        $data = $request->validate([
            "paket" => "required"
        ]);
        $request->session()->put("paket_id", $data["paket"]);
        return redirect("/confirmpayment");
    }

    public function confirmform()
    {
        return view("diskusi.confirm");
    }

    public function confirm(Request $request)
    {
        $data["paket_id"] = $request->session()->get("paket_id");
        $data["user_id"] = Auth::user()->id;
        $transaksi = new Transaksi($data);
        $transaksi->save();
        return redirect("https://wa.me/6282340968471");
    }

    public function activate($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = !$transaksi->status;
        if ($transaksi->status) {
            $transaksi->created_at = Carbon::now();
        }
        $transaksi->save();
        return back();
    }

    public function startchat($pakarId)
    {
        if (Auth::user()->role->role_name === "petani" || Auth::user()->role->role_name === "investor") {
            $session = ChatSession::where([["user_id", Auth::user()->id], ["to", $pakarId]])->first();
            if (!$session) {
                $session = new ChatSession(["user_id" => Auth::user()->id, "to" => $pakarId]);
                $session->save();
            }
            return redirect("/chat/$session->id");
        } else {
            return redirect("/");
        }
    }

    public function chat($id)
    {
        $session = ChatSession::find($id);
        if (Auth::user()->role->role_name === "petani" || Auth::user()->role->role_name === "investor") {
            $chatsessions = ChatSession::where("user_id", Auth::user()->id)->get();
            $recipient = User::find($session->to);
        } else {
            $chatsessions = ChatSession::where("to", Auth::user()->id)->get();
            $recipient = User::find($session->user_id);
        }
        return view("diskusi.chat", ["recipient" => $recipient, "chatSessions" => $chatsessions, "session" => $session]);
    }

    public function pushChat($id, Request $request)
    {
        if (ChatSession::where("id", $id)->where("user_id", Auth::id())->orWhere("to", Auth::id())->first()) {
            $message = $request->input("message");
            $chat = new Chat([
                "chat_session_id" => $id,
                "message" => $message,
                "user_id" => Auth::user()->id
            ]);
            $chat->save();
            return response()->json($chat);
        }
        return response()->status(403);
    }

    public function fetchChat($id, Request $request)
    {
        if (ChatSession::where("id", $id)->where("user_id", Auth::id())->orWhere("to", Auth::id())->first()) {
            $time = $request->input("time");
            if ($time) {
                $chats = Chat::where("created_at", ">", $time)->whereHas("chat_session", function ($q) use ($id) {
                    $q->where("id", $id);
                })->get();
            } else {
                $chats = ChatSession::find($id)->chats;
            }
            return response()->json($chats);
        }
        return response()->json([],403);
    }

    public function riwayat()
    {
        if (Auth::user()->role->role_name === "petani") {
            $chatsessions = ChatSession::where("user_id", Auth::user()->id)->get();
        } else {
            $chatsessions = ChatSession::where("to", Auth::user()->id)->get();
        }
        return view("diskusi.blank", ["chatSessions" => $chatsessions]);
    }
}
