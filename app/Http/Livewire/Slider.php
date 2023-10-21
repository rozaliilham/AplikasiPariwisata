<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\Slider as ModelsSlider;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Slider extends Component
{
    use WithFileUploads;

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    public $title,$image;
    public function delete($id)
    {
        $slider = ModelsSlider::findOrFail($id);
        $destination=public_path('storage\\'.$slider->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $result=$slider->delete();
        if ($result) {
            session()->flash('hapus', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }

    public function store()
    {
        $gallery = new ModelsSlider();
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('images', 'public');
        } else {
            $filename = Null;
        }
        $gallery->title = $this->title;
        $gallery->image = $filename;
        $gallery->save();
        session()->flash('message', 'Slider Berhasil Ditambahkan!');
        return redirect("slider");
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "gallery"   => ModelsSlider::where('title', 'like', '%'.$this->search.'%')->paginate(6)->withQueryString(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.slider',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
