<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class ProdutDetailComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::whereNotIn('slug',[$product->slug])->inRandomOrder()->take(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->take(5)->get();
        return view('livewire.produt-detail-component',compact('product','popular_products','related_products'))->layout('layouts.base');
    }
}
