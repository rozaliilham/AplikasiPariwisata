<?php

namespace App\Http\Livewire\Fasilitas;

use App\Models\FasilitasHomeStay;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Fasilitas extends Component
{

    use WithPagination;
    public $search,$name;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function store()
    {
        FasilitasHomeStay::create([
            "fasilitas" => $this->name,
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        $this->resetInputFields();
        // $this->emit('refreshComponent');
    }

    private function resetInputFields()
    {
        $this->name = '';
    }



    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "fasilitas"   => FasilitasHomeStay::where('fasilitas', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.fasilitas.fasilitas',$data)->extends('admin.layouts.main', $data)->section('content');
    }


    public function delete($id)
    {
        FasilitasHomeStay::find($id)->delete();
    }


}
