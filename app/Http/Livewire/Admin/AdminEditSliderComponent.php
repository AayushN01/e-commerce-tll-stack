<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;


    public $slider_id;
    public $name;
    public $caption;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newImage;

    public function mount($slider_id)
    {
        $slide = HomeSlider::where('id',$slider_id)->first();
        $this->slider_id = $slide->id;
        $this->name = $slide->title;
        $this->caption = $slide->caption;
        $this->link = $slide->link;
        $this->price = $slide->price;
        $this->status = $slide->status;
        $this->image = $slide->image;
    }

    public function updateSlider()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->name;
        $slider->caption = $this->caption;
        $slider->link = $this->link;
        $slider->price = $this->price;
        $slider->status = $this->status;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }

        $slider->save();

        session()->flash('success_msg','Slider has been updated successfully.');
        return redirect()->route('admin.sliders');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
