<?php

namespace App\Http\Livewire\News;

use App\Models\KomentarWisata;
use App\Models\News;
use App\Models\Setting;
use Livewire\Component;

class Detailnews extends Component
{
    public $news;
    public function mount($id)
    {
        $news = News::findOrFail($id);
        $this->news = $news;
    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.news.detailnews')->extends('admin.layouts.main', $data)->section('content');
    }
}
