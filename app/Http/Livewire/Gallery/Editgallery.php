<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editgallery extends Component
{
    use WithFileUploads;

    public $title, $image, $Galleryid;
    public $old_image;
    public $new_image;

    public function mount($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            $this->title = $gallery->title;
            $this->old_image = $gallery->image;
            $this->Galleryid = $gallery->id;
        }
    }

    public function update($id)
    {
        $gallery = Gallery::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $gallery->image);
        if ($this->new_image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store('images', 'public');
            $gallery->title = $this->title;
            $gallery->image = $filename;
            $gallery->save();
        } else {
            $gallery->title = $this->title;
            $gallery->save();
        }
        session()->flash('success', 'Update Successfully');
        // $this->reset(['image', 'title']);
        // return redirect('gallery');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.gallery.editgallery')->extends('admin.layouts.main', $data)->section('content');
    }
}
