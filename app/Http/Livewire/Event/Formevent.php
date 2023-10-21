<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\KomentarWisata;
use App\Models\Setting as ModelsSetting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formevent extends Component
{
    use WithFileUploads;
    public $judul, $mulai, $selesai, $lat, $lng, $status, $lokasi, $ket, $image, $row;

    public function mount()
    {
        $this->row = ModelsSetting::first()->get();
    }

    public function uploadImage()
    {
        $event = new Event();
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('images', 'public');
        } else {
            $filename = null;
        }

        $event->judul = $this->judul;
        $event->mulai = $this->mulai;
        $event->selesai = $this->selesai;
        $event->ket = $this->ket;
        $event->lokasi = $this->lokasi;
        $event->lat = $this->lat;
        $event->lng = $this->lng;
        $event->status = $this->status;
        $event->views = 0;
        $event->user_id = auth()->user()->id;
        $event->image = $filename;
        $event->save();
        session()->flash('message', 'Data has been uploaded successfully');
        $this->reset(['image', 'judul', 'mulai', 'selesai', 'ket', 'lokasi', 'lat', 'lng', 'status']);
    }

    public function render()
    {
        $data = [
            "setting" => ModelsSetting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.event.formevent', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
