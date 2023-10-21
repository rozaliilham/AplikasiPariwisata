<?php

namespace App\Http\Livewire\News;

use App\Models\Category;
use App\Models\KomentarWisata;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
class Editnews extends Component
{
    use WithFileUploads;
    public $image, $judul, $category, $body,$user_id,$category_data,$news,$newsId;
    public $new_image;
    public function mount($id)
    {
        $this->category_data = Category::get();
        $news = News::findOrFail($id);
        $this->news = $news;
        $this->judul = $news->title;
        $this->body = $news->body;
        $this->category = $news->category->id;
        $this->newsId = $news->id;
    }


    public function update($id)
    {
        $news = News::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $news->image);
        if ($this->new_image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store('images', 'public');
            $news->title = $this->judul;
            $news->user_id = auth()->user()->id;
            $news->image = $filename;
            $news->category_id = $this->category;
            $news->body = $this->body;
            $news->views = 0;
            $news->save();
        } else {
            $news->title = $this->judul;
            $news->user_id = auth()->user()->id;
            $news->category_id = $this->category;
            $news->body = $this->body;
            $news->views = 0;
            $news->save();
        }
        session()->flash('message', 'Update Successfully');
        // $this->reset(['image', 'title']);
        // return redirect('gallery');
    }


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.news.editnews')->extends('admin.layouts.main', $data)->section('content');
    }
}
