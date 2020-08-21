@extends('layouts.master')

@section('content')
<div  id="app">
<h2 class="intro-y text-lg font-medium mt-10">Your Booking Slots</h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                  <router-view name="default"></router-view> 
                </div>
</div>
              
@endsection
@push('scripts')
    <script src="{{ mix('js/booking_list.js') }}"></script>
@endpush
