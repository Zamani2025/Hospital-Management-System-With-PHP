<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppointmentComponent extends Component
{
    public function render()
    {
        $userid = auth()->user()->id;

        $appointment = Appointment::where("user_id", $userid)->get();
        return view('livewire.appointment-component', compact("appointment"))->layout("layouts.user");
    }
}
