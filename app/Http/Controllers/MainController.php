<?php

namespace App\Http\Controllers;

use App\Models\HomeStay;
use App\Models\KomentarWisata;
use App\Models\Pembelian;
use App\Models\Reservasi;
use App\Models\Sambutan;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function changeLatLng(Request $request)
    {
        $setting = Setting::first();
        $setting->update([
            "lat" => $request->lat,
            "lng" => $request->lng,
        ]);
        session()->flash('titik', 'Titik lokasi berhasil diperbarui.');
        return redirect()->to('setting-website');

    }

    public function update(Request $request)
    {
        $valid = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $id = $request['id'];
        $setting = Setting::findOrFail($id);
        if ($request->hasFile('image')) {
            $valid['image'] = $request->file('image')->store('image-server-upload');
            // if ($setting->logo) {
            //     // unlink("storage/" . $setting->logo);
            // }else{

            // }
        }
        $setting->update([
            'logo' => $valid['image'],
        ]);
        return redirect('setting-website')->with('msg', 'Konfigurasi logo website berhasil!');

    }

    public function updateSambutan(Request $request)
    {
        $valid = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5048',
        ]);

        $setting = Sambutan::first();
        $filename = "";
        $destination = public_path('storage\\' . $setting->logo);
        if ($request->hasFile('image') != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('image')->store('images', 'public');
            $setting->image = $filename;
            $setting->save();
        }
        return redirect('kata-sambutan')->with('gambar', 'Foto/Gambar Sambutan Berhasil Diperbarui!');

    }

    public function newBody(Request $request)
    {
        $sambutan = Sambutan::first();
        $sambutan->update([
            "body" => $request->body,
        ]);
        return redirect('kata-sambutan')->with('msg', 'Kata sambutan berhasil diperbarui!');
    }
    public function sambutan()
    {
        return view('admin.layouts.sambutan', [
            "setting" => Setting::get(),
            "coment" => KomentarWisata::get(),
            "sambutan" => Sambutan::get(),
        ]);
    }

    public function homestay(Request $request)
    {
        if ($request->datea || $request->dateb) {
            $datea = Carbon::parse($request->datea)->toDateTimeString();
            $dateb = Carbon::parse($request->dateb)->toDateTimeString();
            $x = HomeStay::whereBetween('created_at', [$datea, $dateb])->where("status","=","Tidak Dibooking")->get();
        } else {
            $x = HomeStay::latest()->get();
        }
        return view('livewire.frontend.homestay', [
            "setting" => Setting::get(),
            "x" => $x,
        ]);

    }
    public function memberhomestay(Request $request)
    {
        if ($request->datea || $request->dateb) {
            $datea = Carbon::parse($request->datea)->toDateTimeString();
            $dateb = Carbon::parse($request->dateb)->toDateTimeString();
            $x = HomeStay::where("status","=","Tidak Dibooking")->whereBetween('created_at', [$datea, $dateb])->get();
        } else {
            $x = HomeStay::where("status","=","Tidak Dibooking")->latest()->get();
        }
        return view('livewire.member.homestay', [
            "setting" => Setting::get(),
            "x" => $x,
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function konfirmasiReservasi($id)
    {
        $row = Reservasi::findOrFail($id);
        $row->confirm_status = "Sudah dikonfirmasi admin";
        $row->save();
        return redirect("data-reservasi")->with('confirm', 'Reservasi berhasil dikonfirmasi!');
    }
    public function checkoutReservasi($id)
    {
        $row = Reservasi::findOrFail($id);
        $row->confirm_status = "Selesai";
        $row->save();
        return redirect("data-reservasi")->with('checkout', 'Reservasi berhasil dicheckout!');
    }
    public function konfirmasiPenjualan($id)
    {
        $row = Pembelian::findOrFail($id);
        $row->confirm_status = "Sudah dikonfirmasi admin";
        $row->save();
        return redirect("penjualan")->with('confirm', 'Data berhasil dikonfirmasi!');
    }
}
