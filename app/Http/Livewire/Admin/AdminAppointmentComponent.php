<?php

namespace App\Http\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Component;

class AdminAppointmentComponent extends Component
{
    public function render()
    {
        $appointments = Appointment::all();
        return view('livewire.admin.admin-appointment-component', compact("appointments"))->layout("layouts.admin");
    }
}
