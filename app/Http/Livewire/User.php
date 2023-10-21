<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "user"  => ModelsUser::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.user',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
