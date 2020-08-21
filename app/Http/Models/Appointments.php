<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    //
    protected $guarded = [];

    public function doctor()
    {
        # code...
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function patient()
    {
        # code...
        return $this->belongsTo(User::class,'patient_id');
    }




}
