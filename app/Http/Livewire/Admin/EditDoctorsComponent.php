<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditDoctorsComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $speciality;
    public $number;
    public $room;
    public $image;
    public $doctor_id;
    public $newImage;

    public function mount($id)
    {
        $doctor = Doctor::where("id", $id)->first();

        $this->name = $doctor->name;
        $this->speciality = $doctor->speciality;
        $this->number = $doctor->number;
        $this->room = $doctor->room;
        $this->image = $doctor->image;
        $this->doctor_id = $doctor->id;
        # code...
    }

    public function updateDoctor()
    {
        $doctor = Doctor::findOrFail($this->doctor_id);

        $doctor->name = $this->name;
        $doctor->speciality = $this->speciality;
        $doctor->number = $this->number;
        $doctor->room = $this->room;

        if($this->newImage){
            $imageName = time(). ".". $this->newImage->extension();
            $this->newImage->storeAs("doctors", $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();
        
        toastr()->success('Doctor updated successfully!');

        return redirect()->route("admin.all_doctor");
        # code...
    }

    public function render()
    {
        return view('livewire.admin.edit-doctors-component')->layout("layouts.admin");
    }
}
