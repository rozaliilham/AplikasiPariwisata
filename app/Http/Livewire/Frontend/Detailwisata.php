<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\Wisata;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detailwisata extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $wisata,$comment,$name,$body,$email,$idWisata,$getidWisata;

    public function mount($id)
    {
        $getId = Crypt::decrypt($id);
        $idEnkrip = Crypt::encrypt($getId);

        $this->getidWisata = $idEnkrip;
        $wisata = Wisata::findOrFail($getId);
        $wisata->update([
            "views" => $wisata->views + 1
        ]);
        $this->idWisata = $wisata->id;
        $this->wisata = $wisata;
        $this->comment = KomentarWisata::where("wisata_id",$getId)->get();
        $this->emit('refreshComponent');
    }

    public function store()
    {
        $comment = new KomentarWisata();
        $comment->wisata_id = $this->idWisata;
        $comment->name = $this->name;
        $comment->email = $this->email;
        $comment->comment = $this->body;
        $comment->save();
        session()->flash('message', 'Terimakasih,komentar anda berhasil di terkirim!');
        $this->reset(['name', 'email','body']);
        return redirect()->to("detail-wisatafront/$this->getidWisata");
        // return back();
    }

    public function render()
    {
        $data = [
            "setting"   => Setting::get(),
            "recent" => Wisata::orderByDesc('id')->limit(5)->get(),
            "kategori" => Category::get(),
        ];
        return view('livewire.frontend.detailwisata',$data)->extends('layouts.front', $data)->section('front');
    }
}
