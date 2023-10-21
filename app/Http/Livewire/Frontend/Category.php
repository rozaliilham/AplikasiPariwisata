<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category as ModelsCategory;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    public $category_id;

    public function mount($category_id)
    {
        $getId = Crypt::decrypt($category_id);
        $this->category_id = $getId;
    }


    public function render()
    {
        $category = ModelsCategory::where('id', $this->category_id)->first();
        $category_id = $category->id;
        $data = [
            "setting" => Setting::get(),
            "recent" => News::orderByDesc('id')->limit(5)->get(),
            "kategori" => ModelsCategory::get(),
            "news" => News::where('category_id', $category_id)->where('title', 'like', '%' . $this->search . '%')->paginate(3)->withQueryString(),
        ];
        return view('livewire.frontend.category', $data)->extends('layouts.front', $data)->section('front');

    }
}
