<?php

namespace App\Http\Livewire\News;

use App\Models\KomentarWisata;
use App\Models\News as ModelsNews;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class News extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];


    public function delete($id)
    {
        $gallery = ModelsNews::findOrFail($id);
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
            "news"   => ModelsNews::where('title', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.news.news',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
