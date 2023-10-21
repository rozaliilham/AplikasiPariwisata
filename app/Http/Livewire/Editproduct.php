<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\NomorRekening;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editproduct extends Component
{
    use WithFileUploads;
    public $image, $nama_usaha, $nama_pemilik, $jenis_usaha, $alamat, $produk, $merk, $harga, $telp, $status,$idx,$stok,$norekid,$getuser;
    public $getrek;

    public function mount($id)
    {
        $event = Produk::findOrFail($id);
        $this->idx = $event->id;
        $this->nama_usaha = $event->nama_usaha;
        $this->nama_pemilik = $event->nama_pemilik;
        $this->jenis_usaha = $event->jenis_usaha;
        $this->alamat = $event->alamat;
        $this->produk = $event->produk;
        $this->merk = $event->merk;
        $this->harga = $event->harga;
        $this->telp = $event->telp;
        $this->status = $event->status;
        $this->stok = $event->stok;
        $this->norekid = $event->nomor_rekening_id;
        $this->getrek = NomorRekening::get();
        $this->getuser = User::where("level", "Pedagang")->get();

    }
    public function update($id)
    {
        $event = Produk::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $event->image);

        if ($this->image != "") {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $nomorhp = trim($this->telp);
            $nomorhp = strip_tags($nomorhp);
            $nomorhp = str_replace(" ", "", $nomorhp);
            $nomorhp = str_replace("(", "", $nomorhp);
            $nomorhp = str_replace(".", "", $nomorhp);
            if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
                if (substr(trim($nomorhp), 0, 3) == '62') {
                    $nomorhp = trim($nomorhp);
                } elseif (substr($nomorhp, 0, 1) == '0') {
                    $nomorhp = '62' . substr($nomorhp, 1);
                }
            }
            $filename = $this->image->store('images', 'public');

            $event->image = $filename;
            $event->telp = $nomorhp;
            $event->nama_usaha = $this->nama_usaha;
            $event->nama_pemilik = $this->nama_pemilik;
            $event->jenis_usaha = $this->jenis_usaha;
            $event->alamat = $this->alamat;
            $event->produk = $this->produk;
            $event->merk = $this->merk;
            $event->harga = $this->harga;
            $event->status = $this->status;
            $event->stok = $this->stok;
            $event->nomor_rekening_id = $this->norekid;

            $event->save();
        } else {
            $nomorhp = trim($this->telp);
            $nomorhp = strip_tags($nomorhp);
            $nomorhp = str_replace(" ", "", $nomorhp);
            $nomorhp = str_replace("(", "", $nomorhp);
            $nomorhp = str_replace(".", "", $nomorhp);
            if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
                if (substr(trim($nomorhp), 0, 3) == '62') {
                    $nomorhp = trim($nomorhp);
                } elseif (substr($nomorhp, 0, 1) == '0') {
                    $nomorhp = '62' . substr($nomorhp, 1);
                }
            }
            $event->telp = $nomorhp;
            $event->nama_usaha = $this->nama_usaha;
            $event->nama_pemilik = $this->nama_pemilik;
            $event->jenis_usaha = $this->jenis_usaha;
            $event->alamat = $this->alamat;
            $event->produk = $this->produk;
            $event->merk = $this->merk;
            $event->harga = $this->harga;
            $event->status = $this->status;
            $event->stok = $this->stok;
            $event->nomor_rekening_id = $this->norekid;

            $event->save();
        }

        session()->flash('message', 'Update Successfully');
        return redirect('product');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.editproduct', $data)->extends('admin.layouts.main', $data)->section('content');
    }

}
