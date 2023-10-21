<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginmember(Request $request)
    {
        if (FacadesAuth::attempt(["email" => $request->email, "password" => $request->password, "level" => "Member"]) OR FacadesAuth::attempt(["email" => $request->email, "password" => $request->password, "level" => "Pedagang"])) {
            $request->session()->regenerate();
            return redirect()->intended('member-home');
        }
        session()->flash("error", "Email atau password anda salah!");
        return back();
    }

    public function logout(Request $request)
    {
        FacadesAuth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login-member');
    }

    public function registermember(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        if($check){
            session()->flash("error", "Email sudah terdaftar!");
            return back();
        }else{
            $member = new User();
            $member->name = $request->name;
            $member->telp = $request->telp;
            $member->email = $request->email;
            $member->password = Hash::make($request->password);
            $member->alamat = $request->alamat;
            $member->level = "$request->level";
            $member->save();
            session()->flash("success", "Terima kasih, akun anda berhasil dibuat!");
            return redirect("login-member");

        }
    }
}
