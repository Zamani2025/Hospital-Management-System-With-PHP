<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "date" => ["required"],
            "number" => ["required"],
            "doctor" => ["required"],
            "message" => ["required"],
        ]);

        $appointment = new Appointment();

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->number = $request->number;
        $appointment->doctor = $request->doctor;
        $appointment->status = "pending";
        $appointment->message = $request->message;

        if(Auth::id()){
            $appointment->user_id = auth()->user()->id;
        }
        toastr()->success('Appointment request successful. We will contact with you soon');
        $appointment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Appointment::find($id);

        $data->status = "cancelled";

        $data->save();

        toastr()->success('Appointment cancel successfully');
        
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Appointment::find($id);

        $data->status = "approved";

        $data->save();

        toastr()->success('Appointment approve successfully');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Appointment::find($id);

        $data->delete();

        toastr()->error('Appointment cancelled successfully');
    
        return redirect()->back();
    }
}
