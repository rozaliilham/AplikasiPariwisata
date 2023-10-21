<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\NomorRekening;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Norek extends Component
{
    use WithPagination;
    public $search,$name,$bank,$bank_number;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    protected $listeners = ['refreshData' => '$refresh'];

    public function upload()
    {
        $norek = new NomorRekening();
        $this->validate([
            'name' => 'required',
            'bank' => 'required',
            'bank_number' => 'required',
        ]);
        $norek->name = $this->name;
        $norek->bank = $this->bank;
        $norek->bank_number = $this->bank_number;
        $norek->save();
        session()->flash('insert', 'Data has been uploaded successfully');
        $this->reset(['name', 'bank', 'bank_number']);
        $this->emit('refreshData');

    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "e"   => NomorRekening::where('name', 'like', '%'.$this->search.'%')->paginate(5)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.norek',$data)->extends('admin.layouts.main', $data)->section('content');
    }


    public function delete($id)
    {
        $x = NomorRekening::findOrFail($id);
        $result=$x->delete();
        if ($result) {
            session()->flash('hapus', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }
}
