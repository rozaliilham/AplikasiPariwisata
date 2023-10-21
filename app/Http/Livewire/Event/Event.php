<?php

namespace App\Http\Livewire\Event;

use App\Models\Event as ModelsEvent;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Event extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "event"   => ModelsEvent::where('judul', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.event.event',$data)->extends('admin.layouts.main', $data)->section('content');
    }


    public function delete($id)
    {
        $event = ModelsEvent::findOrFail($id);
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
