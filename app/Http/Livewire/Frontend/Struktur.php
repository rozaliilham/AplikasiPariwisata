<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Setting;
use App\Models\StrukturOrganisasi;
use Livewire\Component;

class Struktur extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "sambutan"  => StrukturOrganisasi::get(),
        ];
        return view('livewire.frontend.struktur',$data)->extends('layouts.front', $data)->section('front');

    }
}
