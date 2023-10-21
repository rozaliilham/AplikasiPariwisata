<?php

namespace App\Http\Livewire\News;

use App\Models\Category;
use App\Models\KomentarWisata;
use App\Models\News;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formnews extends Component
{
    use WithFileUploads;
    public $image, $judul, $category, $body,$user_id,$category_data;

    public function mount()
    {
        $this->category_data = Category::get();
    }
    public function uploadImage()
    {
        $news = new News();
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('images', 'public');
        } else {
            $filename = null;
        }

        $news->title = $this->judul;
        $news->user_id = auth()->user()->id;
        $news->image = $filename;
        $news->category_id = $this->category;
        $news->body = $this->body;
        $news->views = 0;
        $news->save();
        session()->flash('message', 'News has been uploaded successfully');
        $this->reset(['image', 'judul','judul','category','body']);
        // $this->resetField();
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "category" => Category::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.news.formnews', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
