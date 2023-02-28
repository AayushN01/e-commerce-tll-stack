<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $no_of_products;

    public function mount()
    {
        $categories = HomeCategory::find(1);
        $this->selected_categories = explode(',',$categories->sel_categories);
        $this->no_of_products = $categories->no_of_products;
    }

    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_products = $this->no_of_products;
        $category->save();
        session()->flash('success_msg','Home Category has been updated successfully');
        return redirect()->route('admin.home_category');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',compact('categories'))->layout('layouts.base');
    }
}
