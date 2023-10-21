<?php

namespace App\Http\Livewire\Wisata;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\Wisata as ModelsWisata;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Wisata extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "wisata"   => ModelsWisata::where('name', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.wisata.wisata',$data)->extends('admin.layouts.main', $data)->section('content');
    }

    public function delete($id)
    {
        $wisata = ModelsWisata::findOrFail($id);
        $destination=public_path('storage\\'.$wisata->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $result=$wisata->delete();
        if ($result) {
            session()->flash('hapus', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }
}
