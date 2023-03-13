<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug'
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success_msg','Category has been added successfully');
        return redirect()->route('admin.category');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
