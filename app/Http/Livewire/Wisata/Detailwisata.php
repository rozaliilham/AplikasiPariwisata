<?php

namespace App\Http\Livewire\Wisata;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\Wisata;
use Livewire\Component;

class Detailwisata extends Component
{
    public $wisata;
    public function mount($id)
    {
        $wisata = Wisata::findOrFail($id);
        $this->wisata = $wisata;
    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.wisata.detailwisata')->extends('admin.layouts.main', $data)->section('content');
    }
}
