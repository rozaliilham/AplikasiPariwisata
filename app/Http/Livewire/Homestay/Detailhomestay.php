<?php

namespace App\Http\Livewire\Homestay;

use App\Models\HomeStay;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;

class Detailhomestay extends Component
{
    public $news;
    public function mount($id)
    {
        $news = HomeStay::findOrFail($id);
        $this->news = $news;

    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.homestay.detailhomestay', $data)->extends('admin.layouts.main', $data)->section('content');

    }
}
