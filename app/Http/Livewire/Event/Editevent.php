<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editevent extends Component
{
    public $event;
    use WithFileUploads;
    public $judul, $mulai, $selesai, $lat, $lng, $status, $lokasi, $ket, $image, $row, $evendId;

    public function mount($id)
    {
        $this->row = Setting::first()->get();
        $event = Event::findOrFail($id);
        $this->event = $event;
        $this->judul = $event->judul;
        $this->mulai = $event->mulai;
        $this->selesai = $event->selesai;
        $this->lat = $event->lat;
        $this->lng = $event->lng;
        $this->status = $event->status;
        $this->lokasi = $event->lokasi;
        $this->ket = $event->ket;
        $this->evendId = $event->id;
    }

    public function update($id)
    {
        $event = Event::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $event->image);

        if ($this->image != "") {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->image->store('images', 'public');
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
        } else {
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
            $event->save();
        }

        session()->flash('message', 'Update Successfully');
        // $this->reset(['image', 'judul', 'mulai', 'selesai', 'ket', 'lokasi', 'lat', 'lng', 'status']);
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.event.editevent')->extends('admin.layouts.main', $data)->section('content');
    }
}
