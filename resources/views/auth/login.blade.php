@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('লগইন করুন') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('মোবাইল নাম্বার') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone')  is-invalid @enderror" oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" name="phone" value="{{ old('phone') }}" oninput="this.value = this.value.replace(/[^0-9.০-৯]/g, '');" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('পাসওয়ার্ড') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('মনে রাখুন') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('লগইন') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('পাসওয়ার্ড ভুলে গেছেন?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-5">
                            <div class="col-md-8 offset-md-4">
                       <p>আপনার কি কোন অ্যাকাউন্ট আছে? <span><a href="{{route('register')}}">নিবন্ধন করুন</a></span> </p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
