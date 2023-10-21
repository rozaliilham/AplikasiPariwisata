<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    protected $listeners = ['refreshComponent' => '$refresh'];
    public $name;
    public $check = [];
    private function resetInputFields()
    {
        $this->name = '';
    }
    public function store()
    {
        ModelsCategory::create([
            "title" => $this->name,
        ]);
        session()->flash('insert', 'Data berhasil disimpan.');
        $this->resetInputFields();
        // $this->emit('refreshComponent');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "kat" => ModelsCategory::where('title', 'like', '%' . $this->search . '%')->paginate(5),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.category', $data)->extends('admin.layouts.main', $data)->section('content');
    }

    public function delete($id)
    {
        ModelsCategory::find($id)->delete();
        // session()->flash('hapus', 'Data berhasil dihapus.');
        // $this->emit('refreshComponent');
    }

}
