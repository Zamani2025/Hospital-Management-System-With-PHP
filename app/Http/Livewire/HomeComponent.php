<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $doctors = Doctor::all();
        return view('livewire.home-component', compact("doctors"))->layout("layouts.user");
    }

}
