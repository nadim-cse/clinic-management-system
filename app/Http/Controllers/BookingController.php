<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Appointments;
use App\MedicalHistories;
use App\MedicineHistories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class BookingController extends Controller
{
    //
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

    public function Getlist()
    {
        # code...
        $data = Appointments::where('doctor_id', Auth::user()->id)->with('patient')->get();
        return response(['data'=> $data], 200);
    }

    public function list()
    {
        # code...
        // $data = Appointments::where('doctor_id', Auth::user()->id)->with('patient')->get();
        // return $data;
        return view('sections.booking.list');
        
    }
    public function confirm(Request $request)
    {
        # code...
       
        $booking = Appointments::find($request->id);

        $booking->status = 'confirm';

        $booking->save();

        return response(['success'=> 'confirmed'], 200);
    }
    public function cancel(Request $request)
    {
        # code...
       
        $booking = Appointments::find($request->id);

        $booking->status = 'cancel';

        $booking->save();

        return response(['success'=> 'canceled'], 200);
    }
    public function prescription(Request $request)
    {
        # code...
        // return response(['success'=> $request->all()], 200);
       
        $HistoryArray = $request->form;
        $appointment = MedicalHistories::create([

            'patient_id' => $HistoryArray['patient_id'],
            'booking_id' => $HistoryArray['booking_id'],
            'doctor_id' => Auth::user()->id,
            'history' => $HistoryArray['history'],
            'age' => $HistoryArray['age'],
    
        ]);
        $BiD = (int) $HistoryArray['booking_id'];

        $booking = Appointments::find($BiD);

        $booking->status = 'already visited';

        $booking->save();
    
        $inputArray = $request->medicine;
        $stdArray = (object)$inputArray;
        $array = get_object_vars($stdArray);
        $ArrayLength = count($array);
        $dataArray = array();
        for ($i = 0;$i < $ArrayLength;$i++)
        {

        
            $dataArray = [
                'medicine_name' => $array[$i]['medicine_name'], 
                'power' => $array[$i]['power'], 
                'shift' => $array[$i]['shift'], 
                'amount' => $array[$i]['amount'], 
                'medical_history_id' => $appointment->id
                
            ];

            MedicineHistories::create($dataArray);
            
            // Products::where('name',$array[$i]['medicine_name'])
            // ->update([
            // 'stock'=> DB::raw('stock-'.$array[$i]['amount'])
            // ]);
           
    
            
        }
      
         return response(['success'=> 'done'], 200);
    }
    public function GetProductlist()
    {
        # code...
        $data = Products::get();
        return response(['data'=> $data], 200);
    }
}
