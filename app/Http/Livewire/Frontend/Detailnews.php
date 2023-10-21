<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\KomentarBerita;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detailnews extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $news,$comment,$name,$body,$email,$idBerita,$getIdBerita;
    public function mount($id)
    {
        $getId = Crypt::decrypt($id);
        $idEnkrip = Crypt::encrypt($getId);
        $this->getIdBerita = $idEnkrip;
        $news = News::findOrFail($getId);
        $news->update([
            "views" => $news->views + 1
        ]);
        $this->idBerita = $news->id;
        $this->news = $news;
        $this->comment = KomentarBerita::where("news_id",$getId)->get();
        $this->emit('refreshComponent');

    }

    public function store()
    {
        $comment = new KomentarBerita();
        $comment->news_id = $this->idBerita;
        $comment->name = $this->name;
        $comment->email = $this->email;
        $comment->comment = $this->body;
        $comment->save();
        session()->flash('message', 'Terimakasih,komentar anda berhasil di terkirim!');
        $this->reset(['name', 'email','body']);
        return redirect()->to("detail-berita/$this->getIdBerita");
        // return back();
    }
    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "recent" => News::orderByDesc('id')->limit(5)->get(),
            "kategori" => Category::get(),
        ];

        return view('livewire.frontend.detailnews',$data)->extends('layouts.front', $data)->section('front');
    }
}
