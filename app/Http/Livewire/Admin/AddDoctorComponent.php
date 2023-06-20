<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddDoctorComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $speciality;
    public $number;
    public $room;
    public $image;

    public $rules = [
        "name" => ["required"],
        "speciality" => ["required"],
        "number" => ["required"],
        "room" => ["required"],
        "image" => ["required", "image"],
    ];
    public function addDoctor()
    {
        # code...
        $this->validate();

        $doctor = new Doctor();

        $doctor->name = $this->name;
        $doctor->number = $this->number;
        $doctor->speciality = $this->speciality;
        $doctor->room = $this->room;
        $imageName = time() . "." . $this->image->getClientOriginalExtension();
        $this->image->storeAs("doctors", $imageName);
        $doctor->image = $imageName; 

        $doctor->save();
        
        toastr()->success('Doctor saved successfully!');

        return redirect()->route("admin.all_doctor");
    }
    public function render()
    {
        return view('livewire.admin.add-doctor-component')->layout("layouts.admin");
    }
}
