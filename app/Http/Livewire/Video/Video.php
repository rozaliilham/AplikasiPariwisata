<?php

namespace App\Http\Livewire\Video;

use App\Models\GalleryVideo;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "gallery" => GalleryVideo::where('title', 'like', '%' . $this->search . '%')->paginate(6)->withQueryString(),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.video.video', $data)->extends('admin.layouts.main', $data)->section('content');
    }
    public function delete($id)
    {
        $gallery = GalleryVideo::findOrFail($id);
        $result = $gallery->delete();
        if ($result) {
            session()->flash('hapus', 'Data berhasil dihapus!');
        } else {
            session()->flash('error', 'Data gagal dihapus!');
        }
    }

}
