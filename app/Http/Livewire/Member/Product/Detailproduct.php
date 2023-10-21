<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detailproduct extends Component
{

    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];


    public $news, $recent;

    public function mount($id)
    {
        $getId = Crypt::decrypt($id);
        $news = Produk::findOrFail($getId);
        $this->news = $news;
        $this->recent = Produk::orderByDesc('id')->limit(5)->get();

    }

    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "recent" => Produk::orderByDesc('id')->limit(5)->get(),
        ];

        return view('livewire.member.product.detailproduct',$data)->extends('layouts.member', $data)->section('member');
    }
}
