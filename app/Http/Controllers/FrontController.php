<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Setting;

class FrontController extends Controller
{
    public function index()
    {
        if(request('category')){}
        $data = [
            "setting" => Setting::get(),
            "news" => News::where('title', 'like', '%' . $this->search . '%')->paginate(3)->withQueryString(),
            "recent" => News::orderByDesc('id')->limit(5)->get(),
            "kategori" => Category::get(),
        ];
        return view('livewire.frontend.news', $data);
    }
}
