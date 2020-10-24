@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('রেজিস্ট্রেশন করুন') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('নাম') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('মোবাইল নাম্বার') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" name="phone" placeholder="আপনার ১১ ডিজিটের মোবাইল নাম্বারটি দিন " value="{{ old('phone') }}" oninput="this.value = this.value.replace(/[^0-9.০-৯]/g, '');" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"  class="col-md-4 col-form-label text-md-right">{{ __('ই-মেইল') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="যদি কোনো ই-মেইল থাকে তাহলে দিন" class="form-control @error('email') is-invalid @enderror" name="email" oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" value="{{ old('email') }}" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('পাসওয়ার্ড') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"  placeholder="পাসওয়ার্ড (সর্বনিম্ন ৮ অক্ষর)" class="form-control @error('password') is-invalid @enderror" oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('পাসওয়ার্ড নিশ্চিত করুন') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  oninvalid="this.setCustomValidity('স্থানটি সঠিক ভাবে পুরন করুন')"
                                    oninput="setCustomValidity('')" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('রেজিস্টার') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
