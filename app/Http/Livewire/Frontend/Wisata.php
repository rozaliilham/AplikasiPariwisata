<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Wisata as ModelsWisata;
use Livewire\Component;
use Livewire\WithPagination;

class Wisata extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "wisata" => ModelsWisata::where('name', 'like', '%' . $this->search . '%')->paginate(3)->withQueryString(),
            "recent" => ModelsWisata::orderByDesc('id')->limit(5)->get(),
            "kategori" => Category::get(),
        ];
        return view('livewire.frontend.wisata', $data)->extends('layouts.front', $data)->section('front');
    }
}
