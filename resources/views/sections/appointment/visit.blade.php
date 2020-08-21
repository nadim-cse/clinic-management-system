@extends('layouts.master')

@section('content')
<div  id="app">
<div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Prescription Form
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                   <router-view name="default" patient_id="{{ $patient_id}}" booking_id="{{ $booking_id}}" patient_info="{{ $patient_info}}"></router-view> 
                </div>
             </div>    
                @endsection

       @push('scripts')
    <script src="{{ mix('js/patient_visit.js') }}"></script>
@endpush
       