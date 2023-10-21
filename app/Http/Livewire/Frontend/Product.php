<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Produk;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "x" => Produk::where('produk', 'like', '%'.$this->search.'%')->where("stok" ,">",0)->where("status","=","Tersedia")->latest()->paginate(6)->withQueryString(),
            "recent" => Produk::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.product', $data)->extends('layouts.front', $data)->section('front');
    }
}
