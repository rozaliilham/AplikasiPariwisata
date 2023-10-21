<?php

namespace App\Http\Livewire\Wisata;

use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\Wisata;
use Livewire\WithFileUploads;
use Livewire\Component;

class Formwisata extends Component
{
    use WithFileUploads;
    public $name,$tarif,$jenis_usaha,$lokasi,$provinsi,$kabupaten,$kecamatan,$user_id,$category,$lat,$lng,$image,$views,$ket,$datakecamatan,$datakabupaten,$datakategori,$row;

    public function mount()
    {
        $this->datakecamatan = Kecamatan::get();
        $this->datakabupaten = Kabupaten::get();
        $this->datakategori = Category::get();
        $this->row = Setting::first()->get();

    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.wisata.formwisata',$data)->extends('admin.layouts.main', $data)->section('content');
    }

    public function uploadImage()
    {
        $wisata = new Wisata();
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('images', 'public');
        } else {
            $filename = null;
        }
        $wisata->name = $this->name;
        $wisata->tarif = $this->tarif;
        $wisata->jenis_usaha = $this->jenis_usaha;
        $wisata->lokasi = $this->lokasi;
        $wisata->provinsi = $this->provinsi;
        $wisata->kabupaten_id = $this->kabupaten;
        $wisata->kecamatan_id = $this->kecamatan;
        $wisata->category_id = $this->category;
        $wisata->lat = $this->lat;
        $wisata->lng = $this->lng;
        $wisata->ket = $this->ket;
        $wisata->views = 0;
        $wisata->user_id = auth()->user()->id;
        $wisata->image = $filename;
        $wisata->save();
        session()->flash('message', 'Data has been uploaded successfully');
        $this->reset(['image', 'name', 'tarif', 'jenis_usaha', 'lokasi', 'provinsi', 'kabupaten', 'kecamatan', 'category','lat','lng','ket']);
    }


}
