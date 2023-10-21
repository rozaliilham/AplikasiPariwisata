<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\KomentarWisata;
use App\Models\News;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $x = KomentarWisata::select(DB::raw("count(*) as count"))->whereYear("created_at",date("Y"))->groupBy(DB::raw("Month(created_at)"))->pluck("count");
        $berita = News::select(DB::raw("count(*) as count"))->whereYear("created_at",date("Y"))->groupBy(DB::raw("Month(created_at)"))->pluck("count");
        $data = [
            "setting" => Setting::get(),
            "user" => User::get(),
            "berita" => News::get(),
            "wisata" => Wisata::get(),
            "agenda" => Event::get(),
            "x" => $x,
            "z" => $berita,
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.dashboard',$data)->extends('admin.layouts.main',$data)->section('content');
    }
}
