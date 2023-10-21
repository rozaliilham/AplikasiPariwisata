<?php

namespace App\Http\Livewire\Frontend;

use App\Models\HomeStay as ModelsHomeStay;
use App\Models\Setting;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Homestay extends Component
{

    use WithPagination;
    public $search, $datea, $dateb;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    public function store()
    {
        if ($this->datea || $this->dateb) {
            $datea = Carbon::parse($this->datea)->toDateTimeString();
            $dateb = Carbon::parse($this->dateb)->toDateTimeString();
            $x = ModelsHomeStay::whereBetween('created_at', [$datea, $dateb])->get();
        } else {
            $x = ModelsHomeStay::latest()->get();
        }
        $data = [
            "setting" => Setting::get(),
            "x" => $x,
            "recent" => ModelsHomeStay::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.homestay', $data)->extends('layouts.front', $data)->section('front');
    }
    public function render()
    {

        $data = [
            "setting" => Setting::get(),
            "x" => ModelsHomeStay::latest()->get(),
            "recent" => ModelsHomeStay::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.homestay', $data)->extends('layouts.front', $data)->section('front');
    }
}
