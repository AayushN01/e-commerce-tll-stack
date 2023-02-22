<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Cart;

class ProdutDetailComponent extends Component
{
    public $slug;



    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_msg','Item has been added to cart');
        return redirect()->route('cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::whereNotIn('slug',[$product->slug])->inRandomOrder()->take(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->take(5)->get();
        return view('livewire.produt-detail-component',compact('product','popular_products','related_products'))->layout('layouts.base');
    }
}
