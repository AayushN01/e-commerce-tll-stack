<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_slug;
    public $product_id;
    public $name;
    public $slug;
    public $category_id;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $quantity;
    public $newImage;
    public $featured_image;
    public $featured;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
        $product = Product::where('slug',$product_slug)->first();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->category_id = $product->category_id;
        $this->SKU = $product->SKU;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->quantity = $product->quantity;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->featured_image = $product->featured_image;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateProduct()
    {
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->category_id = $this->category_id;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;
        $product->featured = $this->featured;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('products',$imageName);
            $product->featured_image = $imageName;
        }

        $product->save();

        session()->flash('success_msg','A new product has been updated successfully.');
        return redirect()->route('admin.products');
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',compact('categories'))->layout('layouts.base');
    }
}
