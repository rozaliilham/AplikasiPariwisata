<?php

namespace App\Http\Livewire\Wisata;

use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\Wisata;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editwisata extends Component
{
    use WithFileUploads;
    public $name, $tarif, $jenis_usaha, $lokasi, $provinsi, $kabupaten, $kecamatan, $user_id, $category, $lat, $lng, $image, $views, $ket, $datakecamatan, $datakabupaten, $datakategori, $row,$wisataId;
    public function mount($id)
    {
        $this->datakecamatan = Kecamatan::get();
        $this->datakabupaten = Kabupaten::get();
        $this->datakategori = Category::get();
        $this->row = Setting::first()->get();
        $wisata = Wisata::findOrFail($id);
        $this->name = $wisata->name;
        $this->tarif = $wisata->tarif;
        $this->jenis_usaha = $wisata->jenis_usaha;
        $this->lokasi = $wisata->lokasi;
        $this->provinsi = $wisata->provinsi;
        $this->kabupaten = $wisata->kabupaten_id;
        $this->kecamatan = $wisata->kecamatan_id;
        $this->category = $wisata->category_id;
        $this->lat = $wisata->lat;
        $this->lng = $wisata->lng;
        $this->views = $wisata->views;
        $this->ket = $wisata->ket;
        $this->wisataId = $wisata->id;
        $this->row = Setting::first()->get();

    }

    public function update($id)
    {
        $wisata = Wisata::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $wisata->image);
        if ($this->image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->image->store('images', 'public');
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
        } else {
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
            $wisata->save();
        }
        session()->flash('message', 'Update Successfully');
        // $this->reset(['image', 'judul', 'mulai', 'selesai', 'ket', 'lokasi', 'lat', 'lng', 'status']);
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.wisata.editwisata')->extends('admin.layouts.main', $data)->section('content');
    }
}
