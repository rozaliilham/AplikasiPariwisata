<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Pembelian;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Penjualan extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "e"   => Pembelian::latest()->get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.penjualan',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
