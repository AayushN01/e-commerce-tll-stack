<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->latest()->get();
        return view('livewire.home-component',compact('sliders'))->layout('layouts.base');
    }
}
