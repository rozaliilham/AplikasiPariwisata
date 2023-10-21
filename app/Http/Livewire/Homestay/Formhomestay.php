<?php

namespace App\Http\Livewire\Homestay;

use App\Models\FasilitasHomeStay;
use App\Models\HomeStay;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formhomestay extends Component
{
    use WithFileUploads;
    public $image,$name,$price,$location,$description,$status,$fasilitas,$fasilitasName,$telp;

    public function mount()
    {
        $this->fasilitas = FasilitasHomeStay::get();
    }
    public function uploadImage()
    {
        $event = new HomeStay();
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);
        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('images', 'public');
        } else {
            $filename = null;
        }

        $nomorhp = trim($this->telp);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp = str_replace(" ", "", $nomorhp);
        $nomorhp = str_replace("(", "", $nomorhp);
        $nomorhp = str_replace(".", "", $nomorhp);
        if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
            if (substr(trim($nomorhp), 0, 3) == '62') {
                $nomorhp = trim($nomorhp);
            }
            elseif (substr($nomorhp, 0, 1) == '0') {
                $nomorhp = '62' . substr($nomorhp, 1);
            }
        }

        $event->name = $this->name;
        $event->price = $this->price;
        $event->location = $this->location;
        $event->description = $this->description;
        $event->fasilitas = implode(", ", $this->fasilitasName);
        $event->telp = $nomorhp;
        $event->status = "Tidak Dibooking";
        $event->image = $filename;
        $event->save();
        session()->flash('message', 'Data has been uploaded successfully');
        return redirect('homestay');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.homestay.formhomestay', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
