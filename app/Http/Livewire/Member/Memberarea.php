<?php

namespace App\Http\Livewire\Member;

use App\Models\Gallery;
use App\Models\HomeStay;
use App\Models\NomorRekening;
use App\Models\Produk;
use App\Models\Setting;
use Livewire\Component;

class Memberarea extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "datagallery"   => Gallery::orderBy('id','desc')->limit(3)->get(),
            "homestayslider"   => HomeStay::orderBy('id','desc')->limit(3)->get(),
            "homestay"   => HomeStay::orderBy('id','desc')->where("status","=","Tidak Dibooking")->limit(3)->get(),
            "produk"   => Produk::orderBy('id','desc')->where("status","=","Tersedia")->limit(3)->get(),
            "cek"   => NomorRekening::where("name","like","%".auth()->user()->name."%")->get()
        ];

        return view('livewire.member.memberarea',$data)->extends('layouts.member', $data)->section('member');
    }
}
