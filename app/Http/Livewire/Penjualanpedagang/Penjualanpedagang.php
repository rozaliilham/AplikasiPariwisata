<?php

namespace App\Http\Livewire\Penjualanpedagang;

use App\Models\Produk;
use App\Models\Setting;
use Livewire\Component;

class Penjualanpedagang extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "row" => Produk::where('user_id',auth()->user()->id)->get()
        ];
        return view('livewire.penjualanpedagang.penjualanpedagang',$data)->extends('layouts.member', $data)->section('member');

    }
}
