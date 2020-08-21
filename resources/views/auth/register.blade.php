@extends('layouts.app')

@section('content')
<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign Up
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <input id="name" type="text" class="intro-x login__input input input--lg border border-gray-300 block @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="email" type="email" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <input id="mobile" type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('mobile') is-invalid @enderror" placeholder="Mobile" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
                            @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <input id="address" type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('address') is-invalid @enderror" placeholder="Address" name="address" value="{{ old('address') }}" required autocomplete="address">
                            @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <select id="user_type" name="user_type" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('user_type') is-invalid @enderror" required value="{{ old('user_type') }}">
                                <option value="" disabled>Who are you?</option>
                                <option value="doctor">I am a Doctor</option>
                                <option value="pharmacist">I am a Pharmacist</option>
                                <option value="patient">I am a Patient</option>
                            </select>
                            @error('user_type')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password Confirmation">
                        </div>
                        <div class="intro-x flex items-center text-gray-700 mt-4 text-xs sm:text-sm">
                            <input type="checkbox" class="input border mr-2" id="remember-me">
                            <label class="cursor-pointer select-none" for="remember-me">I agree to the Envato</label>
                            <a class="text-theme-1 ml-1" href="">Privacy Policy</a>. 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Register</button>
                        </form>   
                            <a href="/login" class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign in</a>
                        </div>
                    </div>
                </div>
@endsection
