<?php

namespace App\Http\Livewire\Visimisi;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\VisiMisi as ModelsVisiMisi;
use Livewire\Component;

class Visimisi extends Component
{
    public $xvisi;
    public $misi;
    public function mount()
    {
        $data = ModelsVisiMisi::first();
        $this->xvisi = $data->visi;
        $this->misi = $data->misi;
    }

    public function store()
    {
        $data = ModelsVisiMisi::first();
        $data->visi = $this->xvisi;
        $data->misi = $this->misi;
        session()->flash('message', 'Visi Misi berhasil diperbarui');

        $data->save() ;
    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.visimisi.visimisi', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
