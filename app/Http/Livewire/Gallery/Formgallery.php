<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formgallery extends Component
{
    use WithFileUploads;

    public $title, $image,$userid;
    public $old_image;
    public $new_image;

    public function resetField()
    {
        $this->title = "";
        $this->image = "";
    }

    public function uploadImage()
    {

        $gallery = new Gallery();
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
        $gallery->user_id = auth()->user()->id;
        $gallery->image = $filename;
        $gallery->save();
        session()->flash('message', 'Image has been uploaded successfully');
        $this->reset(['image','title']);
        // $this->resetField();
    }


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.gallery.formgallery',$data)->extends('admin.layouts.main', $data)->section('content');
    }
}
