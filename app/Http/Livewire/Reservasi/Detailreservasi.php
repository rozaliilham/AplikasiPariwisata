<?php

namespace App\Http\Livewire\Reservasi;

use App\Models\KomentarWisata;
use App\Models\Reservasi;
use App\Models\Setting;
use Livewire\Component;

class Detailreservasi extends Component
{
    public $row;

    public function mount($id)
    {
        $this->row = Reservasi::findOrFail($id);
    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.reservasi.detailreservasi',$data)->extends('admin.layouts.main', $data)->section('content');

    }
}
