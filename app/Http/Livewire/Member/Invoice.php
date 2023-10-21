<?php

namespace App\Http\Livewire\Member;

use App\Models\Reservasi;
use App\Models\Setting;
use Livewire\Component;

class Invoice extends Component
{
    public $row;

    public function mount($id)
    {
        $this->row = Reservasi::findOrFail($id);
    }
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
        ];

        return view('livewire.member.invoice',$data)->extends('layouts.member', $data)->section('member');

    }
}
