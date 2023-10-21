<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery as ModelsGallery;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;


class Gallery extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function delete($id)
    {
        $gallery = ModelsGallery::findOrFail($id);
        $destination=public_path('storage\\'.$gallery->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $result=$gallery->delete();
        if ($result) {
            session()->flash('hapus', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "gallery"   => ModelsGallery::where('title', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.gallery.gallery',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
