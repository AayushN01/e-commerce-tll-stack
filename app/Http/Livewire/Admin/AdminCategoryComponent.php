<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success_msg','Category has been deleted successfully');
        // return redirect()->back();
    }

    public function render()
    {
        $categories = Category::latest()->paginate(5);
        return view('livewire.admin.admin-category-component',compact('categories'))->layout('layouts.base');
    }
}
