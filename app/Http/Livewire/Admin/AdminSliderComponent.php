<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public function deleteslider($id)
    {
        $slider = HomeSlider::find($id);
        $slider->delete();
        session()->flash('success_msg','Slider has been deleted successfully!');
    }

    public function render()
    {
        $sliders = HomeSlider::latest()->paginate(5);
        return view('livewire.admin.admin-slider-component',compact('sliders'))->layout('layouts.base');
    }
}
