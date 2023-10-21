<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\Pembelian as ModelsPembelian;
use App\Models\Setting;
use Livewire\Component;

class Pembelian extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "reservasi" => ModelsPembelian::where('user_id',auth()->user()->id)->get()
        ];
        return view('livewire.member.product.pembelian',$data)->extends('layouts.member', $data)->section('member');
    }
}
