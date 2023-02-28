<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $caption;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function storeSlider()
    {
        $slider = new HomeSlider();
        $slider->title = $this->name;
        $slider->caption = $this->caption;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->save();
        session()->flash('success_msg','Slider has been added successfully');
        return redirect()->route('admin.sliders');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
