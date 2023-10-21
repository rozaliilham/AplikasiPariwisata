<?php

namespace App\Http\Livewire\Reservasi;

use App\Models\KomentarWisata;
use App\Models\Reservasi as ModelsReservasi;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Reservasi extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "e"   => ModelsReservasi::latest()->get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.reservasi.reservasi',$data)->extends('admin.layouts.main', $data)->section('content');

    }
}
