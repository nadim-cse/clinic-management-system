@extends('layouts.master')

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
                  Prescriptions
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 mt-2">

                        <p><u><strong>Patient Details:</strong></u></p>
                        <ul>
                            <li>Name: {{ $patient_details[0]->name }}</li>
                            <li>Mobile: {{ $patient_details[0]->mobile }}</li>
                            <li>Address:  {{ $patient_details[0]->address }}</li>
                        </ul>
                        <br>
                        <p><u><strong>Doctor Details:</strong></u></p>
                        <ul>
                            <li>Name: {{ $doctor_details[0]->name }}</li>
                            <li>Mobile: {{ $doctor_details[0]->mobile }}</li>
                        </ul>
                
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                     <p><u><strong>Medicine Details:</strong></u></p>
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-no-wrap">#</th>
                                    <th class="text-center whitespace-no-wrap">Name</th>
                                    <th class="text-center whitespace-no-wrap">Power</th>
                                    <th class="text-center whitespace-no-wrap">Amount</th>
                                    <th class="text-center whitespace-no-wrap">Shift</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($histories as $history)
                               
                                <tr class="intro-x">
                                    <td class="text-center"> @php echo $index ++ @endphp</td>
                                    <td class="text-center">{{ $history->medicine_name}}</td>
                                    <td class="text-center">{{ $history->power }}</td>
                                    <td class="text-center">{{ $history->amount }}</td>
                                    <td class="text-center">{{ $history->shift }}</td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                                                <i class="fa fa-ticket"></i><input type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2" value="Confirm This"> 
                                                
                                            </div>
                    </div>
                    <!-- END: Data List -->
               
                </div>
                
     
@endsection