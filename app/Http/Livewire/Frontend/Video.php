<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GalleryVideo;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "gallery" => GalleryVideo::where('title', 'like', '%' . $this->search . '%')->paginate(6)->withQueryString(),
        ];
        return view('livewire.frontend.video',$data)->extends('layouts.front', $data)->section('front');

    }
}
