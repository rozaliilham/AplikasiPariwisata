<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata as ModelsKomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Komentarwisata extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "komentar"   => ModelsKomentarWisata::where('name', 'like', '%'.$this->search.'%')->paginate(5)->withQueryString(),
            "coment"    => ModelsKomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.komentarwisata',$data)->extends('admin.layouts.main', $data)->section('content');
    }

    public function delete($id)
    {
        ModelsKomentarWisata::findOrFail($id)->delete();
    }

}
