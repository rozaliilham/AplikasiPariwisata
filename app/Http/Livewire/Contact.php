<?php

namespace App\Http\Livewire;

use App\Models\Contact as ModelsContact;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "komentar"   => ModelsContact::where('name', 'like', '%'.$this->search.'%')->paginate(5)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.contact',$data)->extends('admin.layouts.main', $data)->section('content');
    }
    public function delete($id)
    {
        ModelsContact::findOrFail($id)->delete();
    }

}
