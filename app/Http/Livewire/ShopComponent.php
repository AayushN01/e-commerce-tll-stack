<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_msg','Item has been added to cart');
        return redirect()->route('cart');
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->latest()->paginate($this->pagesize);
        }else if($this->sorting == 'price'){
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }else if($this->sorting == 'price-desc'){
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else{
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->paginate($this->pagesize);
        }
        $categories = Category::all();
        return view('livewire.shop-component',['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
