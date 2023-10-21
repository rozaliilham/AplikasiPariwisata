<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\News as ModelsNews;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class News extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    public $category_id;
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "news" => ModelsNews::where('title', 'like', '%' . $this->search . '%')->paginate(3)->withQueryString(),
            "recent" => ModelsNews::orderByDesc('id')->limit(5)->get(),
            "kategori" => Category::get(),
        ];
        return view('livewire.frontend.news', $data)->extends('layouts.front', $data)->section('front');
    }

}
