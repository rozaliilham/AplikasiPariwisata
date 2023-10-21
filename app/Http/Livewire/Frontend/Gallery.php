<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Gallery as ModelsGallery;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "gallery" => ModelsGallery::where('title', 'like', '%' . $this->search . '%')->paginate(6)->withQueryString(),
        ];
        return view('livewire.frontend.gallery', $data)->extends('layouts.front', $data)->section('front');
    }
}
