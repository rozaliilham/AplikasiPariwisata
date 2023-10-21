<?php

namespace App\Http\Livewire\Penjualanpedagang;

use App\Models\Pembelian;
use App\Models\Setting;
use Livewire\Component;

class Detailpenjualanbeli extends Component
{
    public $row;

    public function mount($id)
    {
        $this->row = Pembelian::findOrFail($id);
    }
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
        ];
        return view('livewire.penjualanpedagang.detailpenjualanbeli',$data)->extends('layouts.member', $data)->section('member');
    }

}
