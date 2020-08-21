<?php

namespace App\Http\Controllers;

use App\MedicalHistories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    //
    public function List(Type $var = null)
    {
        # code...
        $history = DB::table('medical_histories')->join('medicine_histories', 'medicine_histories.medical_history_id', '=', 'medical_histories.id')
        ->join('users', 'users.id', '=', 'medical_histories.patient_id')
        ->select('medical_histories.id as mh_id', 'medical_histories.*', 'medicine_histories.*', 'users.*')
        ->get();
        // return $history;
         return view('sections.prescription.list',['histories' => $history]);

    }

    public function view($id,$patient_id, $doctor_id)
    {
        # code...
        // DB::enableQueryLog();
        $history = DB::table('medical_histories')->join('medicine_histories', 'medicine_histories.medical_history_id', '=', 'medical_histories.id')
        ->select('medical_histories.*', 'medicine_histories.*')
        ->where('medical_histories.id', $id)
        ->get();

       

        $patient_details = User::find($patient_id)->get();
   
        $doctor_details = User::where('id',$doctor_id)->get();
                //   return $doctor_details;
        
        return view('sections.prescription.view',['histories' => $history, 'patient_details' => $patient_details, 'doctor_details' => $doctor_details]);

    }
}
