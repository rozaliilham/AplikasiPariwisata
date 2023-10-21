<?php

namespace App\Http\Livewire\Penjualanpedagang;

use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Setting;
use Livewire\Component;

class Detailpenjualan extends Component
{
    public $row,$produk;

    public function mount($id)
    {
        $this->produk = Produk::findOrFail($id);
        $this->row = Pembelian::where("produk_id",$id)->get();
    }
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
        ];
        return view('livewire.penjualanpedagang.detailpenjualan',$data)->extends('layouts.member', $data)->section('member');
    }
}
