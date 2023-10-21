<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class Kontak extends Component
{
    public $name,$email,$subject,$message;
    public function store()
    {
        $kontak = new Contact();
        $kontak->name  = $this->name;
        $kontak->email  = $this->email;
        $kontak->subject  = $this->subject;
        $kontak->message  = $this->message;
        $kontak->save();
        session()->flash('message', 'Your message has been sent. Thank you!');
        $this->reset(['name','email','subject','message']);
    }
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
        ];
        return view('livewire.frontend.kontak',$data)->extends('layouts.front', $data)->section('front');
    }
}
