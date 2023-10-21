<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Event;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detailevent extends Component
{
    public $event;
    public function mount($id)
    {
        $getId = Crypt::decrypt($id);
        $event = Event::findOrFail($getId);
        $this->event = $event;
        $event->update([
            "views" => $event->views + 1
        ]);
    }

    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "recent" => Event::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.detailevent',$data)->extends('layouts.front', $data)->section('front');
    }
}
