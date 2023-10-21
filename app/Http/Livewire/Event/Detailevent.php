<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;

class Detailevent extends Component
{
    public $event;
    public function mount($id)
    {
        $event = Event::findOrFail($id);
        $this->event = $event;
    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.event.detailevent')->extends('admin.layouts.main', $data)->section('content');
    }
}
