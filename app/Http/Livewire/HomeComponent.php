<?php

namespace App\Http\Livewire;

use App\Models\HomeCategory;
use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->latest()->get();
        $latest_products = Product::where('stock_status','instock')->latest()->get();
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $sale_products = Product::where('sale_price', '!=', NULl)->latest()->inRandomOrder()->get();
        $sale = Sale::where('status',1)->first();
        return view('livewire.home-component',compact('sliders','latest_products','categories','no_of_products','sale_products','sale'))->layout('layouts.base');
    }
}
