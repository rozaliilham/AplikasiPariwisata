<?php

namespace App\Http\Livewire;

use App\Models\KomentarWisata;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $name;
    public $telp;
    public $email;
    public $password;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->telp = auth()->user()->telp;
        $this->email = auth()->user()->email;
    }

    public function updateProfile()
    {
        $user = User::find(auth()->user()->id);
        if ($this->password != "") {
            $user->update([
                'name' => $this->name,
                'telp' => $this->telp,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        } else {
            $user->update([
                'name' => $this->name,
                'telp' => $this->telp,
                'email' => $this->email,
            ]);
        }
        session()->flash('message', 'Profile berhasil diperbarui.');
        $this->emit('refreshComponent');

    }
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "coment"    => KomentarWisata::orderByDesc('id')->limit(5)->get(),

        ];
        return view('livewire.profile')->extends('admin.layouts.main', $data)->section('content');
    }
}
