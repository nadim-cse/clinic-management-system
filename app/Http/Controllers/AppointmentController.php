<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doctors = User::all()->where('user_type', '=', 'doctor');
        return view('sections.appointment.create')->with('doctors', $doctors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = Appointments::create([

            'doctor_id' => $request->doctor_id,
            'patient_id' => Auth::user()->id,
            'appointment_date' => date('Y-m-d H:i:s', strtotime($request->appointment_date)),
            'appointment_uuid' => Uuid::generate()->string,
            'comments' => $request->editor,
            'status' => 'pending'

        ]);
        return $appointment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Appointments::all()->where('appointment_id', $id);
        return view('sections.appointment.show')->with('data', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        # code...
       
        $data = Appointments::where('patient_id', Auth::user()->id)->with('doctor')->get();
        return view('sections.appointment.list')->with('data', $data);
        
    }
    public function VisitPatient($patient_id, $booking_id)
    {
        # code...
        $patient_info = User::where('id', '=',$patient_id)->get();
        return view('sections.appointment.visit', ['patient_id' => $patient_id , 'booking_id' => $booking_id, 'patient_info' => $patient_info]);

    }
}
