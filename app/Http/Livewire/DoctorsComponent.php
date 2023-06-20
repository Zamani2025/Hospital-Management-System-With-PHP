<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class DoctorsComponent extends Component
{
    public function render()
    {
        $doctors = Doctor::all();
        return view('livewire.doctors-component', compact("doctors"))->layout("layouts.user");
    }
}
