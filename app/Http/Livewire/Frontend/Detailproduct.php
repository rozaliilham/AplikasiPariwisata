<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detailproduct extends Component
{
    public $news, $recent;

    public function mount($id)
    {
        $getId = Crypt::decrypt($id);
        $news = Produk::findOrFail($getId);
        $this->news = $news;
        $this->recent = Produk::orderByDesc('id')->limit(5)->get();

    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "recent" => Produk::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.detailproduct',$data)->extends('layouts.front', $data)->section('front');
    }
}
