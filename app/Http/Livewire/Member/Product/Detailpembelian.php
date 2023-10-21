<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\Pembelian;
use App\Models\Setting;
use Livewire\Component;

class Detailpembelian extends Component
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
        return view('livewire.member.product.detailpembelian',$data)->extends('layouts.member', $data)->section('member');
    }
}
