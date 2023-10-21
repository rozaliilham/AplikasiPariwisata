<?php

namespace App\Http\Livewire;

use App\Models\Kabupaten as ModelsKabupaten;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Kabupaten extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshComponent' => '$refresh'];
    public $name;
    private function resetInputFields()
    {
        $this->name = '';
    }
    public function store()
    {
        ModelsKabupaten::create([
            "name" => $this->name,
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        $this->resetInputFields();
        // $this->emit('refreshComponent');
    }

    public function delete($id)
    {
        ModelsKabupaten::find($id)->delete();
        // session()->flash('hapus', 'Data berhasil dihapus.');
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "kat" => ModelsKabupaten::where('name', 'like', '%'.$this->search.'%')->paginate(5),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.kabupaten', $data)->extends('admin.layouts.main', $data)->section('content');

    }
}
