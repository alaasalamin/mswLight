@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <div class="logo"></div>
        <h1 class="text-uppercase">Partner Portal</h1>
    </div>


</div>


<div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
            <a class="navbar-brand">
                {{$partner}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/home">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/newDevice">Neues Gerät einschicken <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
        <div class="row">

            <div class="col-md-8 mx-auto p-3">
            <div class="card">
                <div class="card-header">
                   <h3>Neues Gerät einschicken</h3>
                </div>
                <div class="card-body">
                <form method="POST" action="{{ url('storeDevice') }}">
            @csrf

            <div class="form-group row my-2">
                <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Hersteller') }}</label>

                <div class="col-md-6">

                    <select id="brand" name="brand" class="form-control form-select text-center">

                        @foreach ($brands as $brand)

                            <option value="{{$brand->brandName}}">{{$brand->brandName}}</option>

                        @endforeach

                    </select>

                    @error('model')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Modell') }}</label>

                <div class="col-md-6">
                    <input placeholder="iPhone 7" id="model" type="text" class="text-center form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model" autofocus>

                    @error('model')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-2">
                <label for="error" class="col-md-4 col-form-label text-md-right">{{ __('Fehlerbeschreibung') }}</label>

                <div class="col-md-6">
                    <input placeholder="Audio IC" id="error" type="text" class="text-center form-control @error('error') is-invalid @enderror" name="error" value="{{ old('error') }}" required autocomplete="error">

                    @error('error')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-6">
                    <input id="business" type="hidden"name="business"  value="{{ Auth::user()->id}}" required>
                    <input id="business" type="hidden" name="status"  value="sent" required>

                    @error('id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-2">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('zusätzliche Info') }}</label>

                <div class="col-md-6">
                    <textarea id="description" class="text-center form-control" name="description" placeholder="Vorgeschichte">{{ old('description') }}</textarea>

                    @error('descriptions')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="deviceStatus" class="col-md-4 col-form-label text-md-right">{{ __('Gerät startet') }}</label>

                <div class="col-md-6 text-center">
                    <div class="deviceStatus">
                    <select id="deviceStatus" name="deviceStatus" class="form-control form-select ">

                            <option class="text-center"  value="Normal">Normal</option>
                            <option class="text-center" value="hängt beim Logo">hängt beim Logo</option>
                            <option class="text-center" value="Bootloopt">Bootloopt</option>
                            <option class="text-center" value="iTunes Modus">iTunes Modus</option>
                            <option class="text-center" value="Startet nicht">Startet nicht</option>
                            <option class="text-center" value="Falsche/Keine Bilddarstellung">Falsche/Keine Bilddarstellung</option>

                    </select>
                    </div>
                    @error('model')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="pinCode" class="col-md-4 col-form-label text-md-right">{{ __('Sperrcode') }}</label>

                <div class="col-md-6">
                    <input placeholder="123456" id="pinCode" type="text" class="text-center form-control @error('pinCode') is-invalid @enderror" name="pinCode" value="{{ old('pinCode') }}" autofocus>
                    @error('pinCode')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="simCode" class="col-md-4 col-form-label text-md-right">{{ __('Sim Pin') }}</label>

                <div class="col-md-6">
                    <input placeholder="1234" id="simCode" type="text" class="text-center form-control @error('simCode') is-invalid @enderror" name="simCode" value="{{ old('simCode') }}" autofocus>
                    @error('simCode')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="accessory" class="col-md-4 col-form-label text-md-right">{{ __('Zubehör') }}</label>

                <div class="col-md-6">
                    <input placeholder="Keines" id="accessory" type="text" class="text-center form-control @error('accessories') is-invalid @enderror" name="accessories" value="{{ old('accessories') }}" autofocus>

                    @error('imei')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="dataRecovery" class="col-md-4 col-form-label text-md-right">{{ __('Daten relevant?') }}</label>

                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dataRecovery" id="exampleRadios1" value="0" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Nein
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dataRecovery" id="exampleRadios2" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Ja
                        </label>
                    </div>

                    @error('dataRecovery')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="imei" class="col-md-4 col-form-label text-md-right">{{ __('IMEI/SN') }}</label>

                <div class="col-md-6">
                    <input placeholder="353915102043702" id="imei" type="text" class="text-center form-control @error('imei') is-invalid @enderror" name="imei" value="{{ old('imei') }}" autofocus>

                    @error('imei')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Preisfreigabe') }}</label>

                <div class="col-md-6">
                    <input placeholder="99€" id="price" type="text" class="text-center form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autofocus>

                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

                    <input value="sent" name="status" type="hidden"/>

            <div class="form-group row mb-0 my-2">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('hinzufügen') }}
                    </button>
                    <!-- <a href="https://www.dhl.de/dhl-rpi/gw/rpcustomerweb/OrderAnon.action?__userlocale=DE&__gwfs=3361400428910302208" class="btn btn-primary text-light">
                        {{ __('DHL ') }}
                    </a> -->
                </div>
            </div>
        </form>

                </div>
                </div>
            </div>

        </div>
    </div>
@endsection
