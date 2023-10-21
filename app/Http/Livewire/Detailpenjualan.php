<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Pembelian;
use App\Models\Setting;
use Livewire\Component;

class Detailpenjualan extends Component
{
    public $row;

    public function mount($id)
    {
        $this->row = Pembelian::findOrFail($id);
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.detailpenjualan',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
