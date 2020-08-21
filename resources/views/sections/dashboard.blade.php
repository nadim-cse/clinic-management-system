@extends('layouts.master')

@section('content')

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>
                            <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        @if(Auth::user()->user_type == 'pharmacist')
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="file" class="report-box__icon text-theme-10"></i> 
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $products}}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Products</div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="file" class="report-box__icon text-theme-10"></i> 
                                           
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $stock_out_products}}</div>
                                        <div class="text-base text-gray-600 mt-1">Stock out products</div>
                                        <a href="{{ route('products.low.inventory') }}">See Details</a>
                                    </div>
                                </div>
                            </div>
                             @endif
                            @if(Auth::user()->user_type == 'admin')
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">0</div>
                                        <div class="text-base text-gray-600 mt-1">Total Patients</div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                        <i data-feather="user" class="report-box__icon text-theme-10"></i> 
                                            
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">0</div>
                                        <div class="text-base text-gray-600 mt-1">Total Doctors</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                             @if(Auth::user()->user_type == 'doctor')
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">0</div>
                                        <div class="text-base text-gray-600 mt-1">Total Appointment</div>
                                    </div>
                                </div>
                            </div>
                             @endif
                             @if(Auth::user()->user_type == 'patient')
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">0</div>
                                        <div class="text-base text-gray-600 mt-1">Total Appointment</div>
                                    </div>
                                </div>
                            </div>
                             @endif
                        </div>
                    </div>
                    <!-- END: General Report -->
            </div>
     
@endsection