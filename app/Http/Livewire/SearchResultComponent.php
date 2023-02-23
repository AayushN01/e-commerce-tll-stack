<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;

class SearchResultComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_msg','Item has been added to cart');
        return redirect()->route('cart');
    }

    use WithPagination;

    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id', 'LIKE' . '%'. $this->product_cat_id .'%')->latest()->paginate($this->pagesize);
        }else if($this->sorting == 'price'){
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id', 'LIKE' . '%'. $this->product_cat_id .'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }else if($this->sorting == 'price-desc'){
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id', 'LIKE' . '%'. $this->product_cat_id .'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else{
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id', 'LIKE' . '%'. $this->product_cat_id .'%')->paginate($this->pagesize);
        }
        $categories = Category::all();
        return view('livewire.search-result-component',['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
