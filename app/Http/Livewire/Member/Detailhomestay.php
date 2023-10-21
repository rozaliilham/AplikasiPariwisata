<?php

namespace App\Http\Livewire\Member;

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
        return view('livewire.member.detailhomestay',$data)->extends('layouts.member', $data)->section('member');
    }


}
