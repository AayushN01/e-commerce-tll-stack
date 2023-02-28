<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->latest()->get();
        $latest_products = Product::where('stock_status','instock')->latest()->get();
        return view('livewire.home-component',compact('sliders','latest_products'))->layout('layouts.base');
    }
}
