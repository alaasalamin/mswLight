@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <div class="logo"></div>
        <h1 class="text-uppercase">B2b Portal</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrierung') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror text-center" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Addresse') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Email Addresse" id="email" type="email" class="text-center form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="firm" class="col-md-4 col-form-label text-md-end">{{ __('Firmen Name') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Firmen Name" id="firm" type="text" class="text-center form-control @error('firm') is-invalid @enderror" name="firm" value="{{ old('firm') }}" required autocomplete="firm" >

                                @error('firm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="plz" class="col-md-4 col-form-label text-md-end">{{ __('PLZ / Stadt') }}</label>

                            <div class="col-md-6">
                                <input id="plz" placeholder="PLZ" type="text" class="text-center form-control @error('plz') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required>
                                
                                <input type="text" placeholder="Stadt" class="text-center form-control @error('stadt') is-invalid @enderror" name="city" value="{{ old('city') }}" required>

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="street" class="col-md-4 col-form-label text-md-end">{{ __('Straße') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Straße ,31" id="street" type="text" class="text-center form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="name">

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefonnummer') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Telefonnummer" id="phone" type="text" class="text-center form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Passwort') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Passwort" id="password" type="password" class="text-center form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Passwort bestätigen') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Passwort bestätigen" id="password-confirm" type="password" class="text-center form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrierung') }}
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
