<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Wisata;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class Bycategorywisata extends Component
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
        $category = Category::where('id', $this->category_id)->first();
        $category_id = $category->id;
        $data = [
            "setting" => Setting::get(),
            "wisata" => Wisata::where('category_id',$category_id)->where('name', 'like', '%' . $this->search . '%')->paginate(3)->withQueryString(),
            "recent" => Wisata::orderByDesc('id')->limit(5)->get(),
            "kategori" => Category::get(),
        ];
        return view('livewire.frontend.bycategorywisata',$data)->extends('layouts.front', $data)->section('front');
    }
}
