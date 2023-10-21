<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Event as ModelsEvent;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Event extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            "event" => ModelsEvent::where('judul', 'like', '%' . $this->search . '%')->paginate(3)->withQueryString(),
            "recent" => ModelsEvent::orderByDesc('id')->limit(5)->get(),
        ];
        return view('livewire.frontend.event', $data)->extends('layouts.front', $data)->section('front');
    }
}
