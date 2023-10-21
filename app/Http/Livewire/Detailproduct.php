<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Produk;
use App\Models\Setting;
use Livewire\Component;

class Detailproduct extends Component
{
    public $row;
    public function mount($id)
    {
        $row = Produk::findOrFail($id);
        $this->row = $row;

    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.detailproduct', $data)->extends('admin.layouts.main', $data)->section('content');


    }
}
