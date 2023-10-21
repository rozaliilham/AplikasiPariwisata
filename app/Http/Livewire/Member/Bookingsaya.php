<?php

namespace App\Http\Livewire\Member;

use App\Models\Reservasi;
use App\Models\Setting;
use Livewire\Component;

class Bookingsaya extends Component
{
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "reservasi" => Reservasi::where('user_id',auth()->user()->id)->get()
        ];

        return view('livewire.member.bookingsaya',$data)->extends('layouts.member', $data)->section('member');
    }

}
