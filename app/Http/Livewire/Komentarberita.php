<?php

namespace App\Http\Livewire;

use App\Models\KomentarBerita as ModelsKomentarBerita;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Komentarberita extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "komentar"   => ModelsKomentarBerita::where('name', 'like', '%'.$this->search.'%')->paginate(5)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.komentarberita',$data)->extends('admin.layouts.main', $data)->section('content');
    }

    public function delete($id)
    {
       ModelsKomentarBerita::findOrFail($id)->delete();
    }
}
