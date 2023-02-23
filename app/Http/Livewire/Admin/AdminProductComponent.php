<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('success_msg','Product has been deleted successfully');
        // return redirect()->back();
    }

    public function render()
    {
        $products = Product::with('category')->latest()->paginate(5);
        return view('livewire.admin.admin-product-component',compact('products'))->layout('layouts.base');
    }
}
