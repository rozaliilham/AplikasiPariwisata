<?php

namespace App\Http\Livewire\Frontend\Auth;

use App\Models\Setting;
use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
        ];

        return view('livewire.frontend.auth.login',$data)->extends('layouts.front', $data)->section('front');
    }
}
