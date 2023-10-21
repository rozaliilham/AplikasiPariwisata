<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\NomorRekening;
use App\Models\Produk;
use App\Models\Setting;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formproduct extends Component
{
    use WithFileUploads;
    public $image,$nama_usaha,$nama_pemilik,$jenis_usaha,$alamat,$produk,$merk,$harga,$telp,$status,$stok,$norekid,$getuser;
    public $getrek;

    public function mount()
    {
        $this->getrek = NomorRekening::get();
        $this->getuser = User::where("level", "Pedagang")->get();
    }
    public function uploadImage()
    {
        $event = new Produk();
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('images', 'public');
        } else {
            $filename = null;
        }

        $nomorhp = trim($this->telp);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp = str_replace(" ", "", $nomorhp);
        $nomorhp = str_replace("(", "", $nomorhp);
        $nomorhp = str_replace(".", "", $nomorhp);
        if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
            if (substr(trim($nomorhp), 0, 3) == '62') {
                $nomorhp = trim($nomorhp);
            }
            elseif (substr($nomorhp, 0, 1) == '0') {
                $nomorhp = '62' . substr($nomorhp, 1);
            }
        }

        $event->nama_usaha = $this->nama_usaha;
        $event->user_id = $this->nama_pemilik;
        $event->jenis_usaha = $this->jenis_usaha;
        $event->alamat = $this->alamat;
        $event->produk = $this->produk;
        $event->merk = $this->merk;
        $event->harga = $this->harga;
        $event->stok = $this->stok;
        $event->nomor_rekening_id = $this->norekid;
        $event->status = "Tersedia";
        $event->telp = $nomorhp;
        $event->image = $filename;
        $event->save();
        session()->flash('message', 'Data has been uploaded successfully');
        return redirect('product');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.formproduct', $data)->extends('admin.layouts.main', $data)->section('content');
    }

}
