<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AllDoctorsComponent extends Component
{
    public function render()
    {
        $doctors = Doctor::all();
        return view('livewire.admin.all-doctors-component', compact("doctors"))->layout("layouts.admin");
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);

        Storage::delete($doctor->image);
        
        $doctor->delete();

        toastr()->success('Doctor deleted successfully');

        return redirect()->back();
    }
}
