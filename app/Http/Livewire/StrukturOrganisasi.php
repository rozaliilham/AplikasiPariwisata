<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\StrukturOrganisasi as ModelsStrukturOrganisasi;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class StrukturOrganisasi extends Component
{
    use WithFileUploads;

    public $image,$imagenew;
    public function mount()
    {
        $data = ModelsStrukturOrganisasi::first();
        $this->imagenew = $data->image;
    }

    public function update()
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $data = ModelsStrukturOrganisasi::first();
        $filename = "";
        $destination = public_path('storage\\' . $data->image);
        if ($this->image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->image->store('images', 'public');
            $data->image = $filename;
            $data->save();
        }
        session()->flash('success', 'Update Successfully');
        // $this->reset(['image', 'title']);
        return redirect('struktur-organisasi');
    }


    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.struktur-organisasi')->extends('admin.layouts.main', $data)->section('content');
    }
}
