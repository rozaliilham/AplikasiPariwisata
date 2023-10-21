<?php

namespace App\Http\Livewire\Video;

use App\Models\GalleryVideo;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;

class Editvideo extends Component
{
    public $title,$src,$idx;
    public function mount($id)
    {
        $g = GalleryVideo::findOrFail($id);
        $this->title = $g->title;
        $this->src = $g->src;
        $this->idx = $g->id;
    }
    public function store($id)
    {
        $gv =  GalleryVideo::findOrFail($id);
        $gv->user_id = auth()->user()->id;
        $gv->title = $this->title;
        $gv->src = $this->src;
        $gv->save();
        session()->flash('message', 'Data berhasil disimpan!');

    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.video.editvideo', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
