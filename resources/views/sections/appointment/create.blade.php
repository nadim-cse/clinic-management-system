@extends('layouts.master')

@section('content')
<div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       New Appointment Form
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                   <!-- <NotaryCreateForm></NotaryCreateForm> -->
                   <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                   Fields
                                </h2>
                            </div>
                            <div class="p-5" id="input">
                                <div class="preview">
                                    <form action="{{ route('appointments.store') }}" method="POST">
                                        @csrf
                                        <div class="mt-3">
                                            <label>Select Doctor (*)</label>
                                            <div class="mt-2">
                                                <select name="doctor_id" class="input input--lg w-full border mt-2">
                                                    <option selected readonly>---- Select a doctor from this list ----</option>
                                                    @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="text-xs text-gray-600 mt-2">All doctors registered to this system is listed here.</div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Select date (*)</label>
                                            <div class="mt-2">
                                                    <div class="" id="basic-datepicker">
                                                        <div class="preview">
                                                            <input name="appointment_date" class="datepicker input w-56 border block">
                                                        </div>
                                                    </div>
                                            </div>
                                             <div class="text-xs text-gray-600 mt-2">You can choose Appointment date from here</div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Your comments</label>
                                            <div class="mt-2">
                                                <textarea data-feature="basic" class="summernote" name="editor"></textarea>
                                            </div>
                                            <div class="text-xs text-gray-600 mt-2">Write your comments here</div>
                                        </div>
                                        <div class="mt-3">
                                            <i class="fa fa-ticket"></i><input type="submit" class="button inline-block mr-1 mb-2 bg-theme-9 text-white inline-flex items-center" value="Book Appointment"> 
                                                <!-- <i data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-auto"></i>  -->
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END: Input -->
                    
                    </div>
                </div>
                 
                @endsection

              