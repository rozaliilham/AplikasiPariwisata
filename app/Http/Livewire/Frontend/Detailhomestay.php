<?php

namespace App\Http\Livewire\Frontend;

use App\Models\HomeStay;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detailhomestay extends Component
{

    public $news, $recent;
    public function mount($id)
    {
        $getId = Crypt::decrypt($id);
        $news = HomeStay::findOrFail($getId);
        $this->news = $news;
        $this->recent = HomeStay::orderByDesc('id')->limit(5)->get();

    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "recent" => HomeStay::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.detailhomestay',$data)->extends('layouts.front', $data)->section('front');
    }
}
