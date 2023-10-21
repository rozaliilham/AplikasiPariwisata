<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Sambutan as ModelsSambutan;
use App\Models\Setting;
use Livewire\Component;

class Sambutan extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "sambutan"  => ModelsSambutan::get(),
        ];
        return view('livewire.frontend.sambutan',$data)->extends('layouts.front', $data)->section('front');
    }
}
