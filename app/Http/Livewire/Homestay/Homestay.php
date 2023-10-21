<?php

namespace App\Http\Livewire\Homestay;

use App\Models\HomeStay as ModelsHomeStay;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Homestay extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "event"   => ModelsHomeStay::where('name', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.homestay.homestay',$data)->extends('admin.layouts.main', $data)->section('content');
    }


    public function delete($id)
    {
        $event = ModelsHomeStay::findOrFail($id);
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
