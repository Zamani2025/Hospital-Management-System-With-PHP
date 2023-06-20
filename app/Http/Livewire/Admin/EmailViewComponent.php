<?php

namespace App\Http\Livewire\Admin;

use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
// use Illuminate\Support\Facades\Notification as FacadesNotification;
use Notification;
use Livewire\Component;

class EmailViewComponent extends Component
{

    public $greeting;
    public $body;
    public $actionText;
    public $actionUrl;
    public $endPart;

    public $appointment_id;

    public $rules = [
        "greeting" => ["required"],
        "body" => ["required"],
        "actionText" => ["required"],
        "actionUrl" => ["required"],
        "endPart" => ["required"],
    ];

    public function mount($id)
    {
        $doctor = Appointment::where("id", $id)->first();
        $this->appointment_id = $doctor->id;
        # code...
    }
    public function sendmail()
    {
        $this->validate();
        # code...
        $data = Appointment::find($this->appointment_id);

        $details = [
            "greeting" => $this->greeting,
            "body" => $this->body,
            "actionText" => $this->actionText,
            "actionUrl" => $this->actionUrl,
            "endPart" => $this->endPart
        ];

        Notification::send($data, new SendEmailNotification($details));

        toastr()->success('Email send successful!');

        return redirect()->route("admin.appointments");
    }
    public function render()
    {
        return view('livewire.admin.email-view-component',)->layout("layouts.admin");
    }
}
