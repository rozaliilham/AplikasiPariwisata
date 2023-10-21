<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan as ModelsKecamatan;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Kecamatan extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];


    protected $listeners = ['refreshComponent' => '$refresh'];
    public $name;
    private function resetInputFields(){
        $this->name = '';
    }
    public function store()
    {
        ModelsKecamatan::create([
            "name"  => $this->name
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        $this->resetInputFields();
        // $this->emit('refreshComponent');
    }

    public function delete($id)
    {
        ModelsKecamatan::find($id)->delete();
        // session()->flash('hapus', 'Data berhasil dihapus.');
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "kat" => ModelsKecamatan::where('name', 'like', '%'.$this->search.'%')->paginate(5),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.kecamatan',$data)->extends('admin.layouts.main',$data)->section('content');
    }
}
