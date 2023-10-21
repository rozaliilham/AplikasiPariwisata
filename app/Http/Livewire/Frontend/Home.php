<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CheckOutProduct;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\HomeStay;
use App\Models\News;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Reservasi;
use App\Models\Sambutan;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Wisata;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "berita" => News::get(),
            "wisata" => Wisata::get(),
            "homestay" => Wisata::get(),
            "agenda" => Event::get(),
            "gallery" => Gallery::get(),
            "dataproduct" => Produk::get(),
            "sambutan"  => Sambutan::get(),
            "beli"  => CheckOutProduct::get(),
            "checkin"  => Reservasi::where('confirm_status','Sudah dikonfirmasi admin')->get(),
            "slider"    => Slider::orderBy('id','desc')->limit(3)->get(),
            "product"    => Produk::orderBy('id','desc')->limit(3)->get(),
            "datagallery"   => Gallery::orderBy('id','desc')->limit(3)->get(),
            "datawisata"   => Wisata::orderBy('id','desc')->limit(3)->get(),
            "databerita"   => News::orderBy('id','desc')->limit(3)->get(),
            "datahomestay"   => HomeStay::orderBy('id','desc')->limit(3)->get()
        ];

        return view('livewire.frontend.home',$data)->extends('layouts.front', $data)->section('front');
    }
}
