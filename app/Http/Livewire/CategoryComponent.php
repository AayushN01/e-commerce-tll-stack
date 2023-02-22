<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;
use Illuminate\Http\Request;

class CategoryComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_msg','Item has been added to cart');
        return redirect()->route('cart');
    }


    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();

        if($this->sorting == 'date')
        {
            $products = Product::where('category_id',$category->id)->latest()->paginate($this->pagesize);
        }else if($this->sorting == 'price'){
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }else if($this->sorting == 'price-desc'){
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else{
            $products = Product::where('category_id',$category->id)->paginate($this->pagesize);
        }
        $categories = Category::all();
        return view('livewire.category-component',compact('products','categories','category'))->layout('layouts.base');
    }
}
