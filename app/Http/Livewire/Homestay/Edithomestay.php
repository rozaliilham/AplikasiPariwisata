<?php

namespace App\Http\Livewire\Homestay;

use App\Models\FasilitasHomeStay;
use App\Models\HomeStay;
use App\Models\KomentarWisata;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edithomestay extends Component
{
    use WithFileUploads;
    public $image, $name, $price, $location, $description, $status, $fasilitas, $fasilitasName, $telp, $idx;

    public function mount($id)
    {
        $e = HomeStay::findOrFail($id);
        $this->name = $e->name;
        $this->price = $e->price;
        $this->location = $e->location;
        $this->description = $e->description;
        $this->telp = $e->telp;
        $this->fasilitasName = explode(", ", $e->fasilitas);
        $this->idx = $e->id;
        $this->fasilitas = FasilitasHomeStay::get();

    }

    public function update($id)
    {
        $event = HomeStay::findOrFail($id);
        $filename = "";
        $destination = public_path('storage\\' . $event->image);

        if ($this->image != "") {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $nomorhp = trim($this->telp);
            $nomorhp = strip_tags($nomorhp);
            $nomorhp = str_replace(" ", "", $nomorhp);
            $nomorhp = str_replace("(", "", $nomorhp);
            $nomorhp = str_replace(".", "", $nomorhp);
            if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
                if (substr(trim($nomorhp), 0, 3) == '62') {
                    $nomorhp = trim($nomorhp);
                } elseif (substr($nomorhp, 0, 1) == '0') {
                    $nomorhp = '62' . substr($nomorhp, 1);
                }
            }
            $filename = $this->image->store('images', 'public');
            $event->name = $this->name;
            $event->price = $this->price;
            $event->location = $this->location;
            $event->description = $this->description;
            $event->status = "Tidak Dibooking";
            $event->image = $filename;
            $event->telp = $nomorhp;
            if($this->fasilitasName != ""){
                $event->fasilitas = implode(", ", $this->fasilitasName);
            }else{

                $event->fasilitas = $event->fasilitas;
            }

            $event->save();
        } else {
            $nomorhp = trim($this->telp);
            $nomorhp = strip_tags($nomorhp);
            $nomorhp = str_replace(" ", "", $nomorhp);
            $nomorhp = str_replace("(", "", $nomorhp);
            $nomorhp = str_replace(".", "", $nomorhp);
            if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
                if (substr(trim($nomorhp), 0, 3) == '62') {
                    $nomorhp = trim($nomorhp);
                } elseif (substr($nomorhp, 0, 1) == '0') {
                    $nomorhp = '62' . substr($nomorhp, 1);
                }
            }
            $event->name = $this->name;
            $event->price = $this->price;
            $event->location = $this->location;
            $event->description = $this->description;
            $event->status = "Tidak Dibooking";
            $event->telp = $nomorhp;
            if($this->fasilitasName != ""){
                $event->fasilitas = implode(", ", $this->fasilitasName);
            }else{
                $event->fasilitas = $event->fasilitas;
            }
            $event->save();
        }

        session()->flash('message', 'Update Successfully');
        return redirect('homestay');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment" => KomentarWisata::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.homestay.edithomestay', $data)->extends('admin.layouts.main', $data)->section('content');
    }
}
