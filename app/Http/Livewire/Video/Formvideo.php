<?php

namespace App\Http\Livewire\Video;

use App\Models\GalleryVideo;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;

class Formvideo extends Component
{
    public $title,$src;
    public function store()
    {
        $gv = New GalleryVideo();
        $gv->user_id = auth()->user()->id;
        $gv->title = $this->title;
        $gv->src = $this->src;
        $gv->save();
        session()->flash('message', 'Data berhasil disimpan!');
        $this->reset(['title','src']);

    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.video.formvideo', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
