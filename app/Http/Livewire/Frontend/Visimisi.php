<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Setting;
use App\Models\VisiMisi as ModelsVisiMisi;
use Livewire\Component;

class Visimisi extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "sambutan"  => ModelsVisiMisi::get(),
        ];
        return view('livewire.frontend.visimisi',$data)->extends('layouts.front', $data)->section('front');
    }
}
