<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;

class Settingpembayaran extends Component
{
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.settingpembayaran', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
