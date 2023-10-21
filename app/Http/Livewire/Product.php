<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "event"   => Produk::where('produk', 'like', '%'.$this->search.'%')->latest()->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.product',$data)->extends('admin.layouts.main', $data)->section('content');

    }

    public function delete($id)
    {
        $event = Produk::findOrFail($id);
        $destination=public_path('storage\\'.$event->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $result=$event->delete();
        if ($result) {
            session()->flash('hapus', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }
}
