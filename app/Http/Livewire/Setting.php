<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Setting as ModelsSetting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
class Setting extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    use WithFileUploads;

    public $new_image;
    public $web;
    public $keyword;
    public $alamat;
    public $telp;
    public $email;
    public $lat;
    public $lng;
    public $old_image;

    public function mount()
    {
        $setting = ModelsSetting::first();
        $this->web = $setting->web;
        $this->keyword = $setting->keyword;
        $this->alamat = $setting->alamat;
        $this->telp = $setting->telp;
        $this->email = $setting->email;
        $this->old_image = $setting->logo;
        // $this->lat = $setting->lat;
        // $this->lng = $setting->lng;
    }

    public function clear()
    {
        $this->reset(['data']);
    }
    public function store()
    {
        $setting = ModelsSetting::first();
        $setting->update([
            "web"   => $this->web,
            "keyword"   => $this->keyword,
            "alamat"   => $this->alamat,
            "telp"   => $this->telp,
            "email"   => $this->email,
        ]);
        session()->flash('ubah', 'Website berhasil diperbarui.');
        return redirect()->to('setting-website');
    }
    public function newTitik()
    {
        $setting = ModelsSetting::first();
        $setting->update([
            "lat"   => $this->lat,
            "lng"   => $this->lng,
        ]);
        session()->flash('titik', 'Titik lokasi berhasil diperbarui.');
        return redirect()->to('setting-website');


    }

    public function update()
    {
        $setting = ModelsSetting::first();
        $filename = "";
        $destination = public_path('storage\\' . $setting->logo);
        if ($this->new_image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store('images', 'public');
            $setting->logo = $filename;
            $setting->save();
        }
        session()->flash('successlogo', 'Update Successfully');
        return redirect()->to('setting-website');
        // $this->emit('refreshComponent',$setting);

        // $this->reset(['image', 'title']);
        // return redirect('gallery');
    }

    public function render()
    {
        $data = [
            "setting" => ModelsSetting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.setting', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
