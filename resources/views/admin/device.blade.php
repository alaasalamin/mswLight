@extends('layouts.app')

@section('content')
<div class="container">
<div class="text-center">
        <div style="    width: 300px;
                        height: 120px;
                        background: url('../../img/logo.png') no-repeat center;
                        background-size: contain ;
                        margin-left: auto;
                        margin-right: auto;
                        margin-bottom: 10px;
                        margin-top: 20px;
        ">

        </div>
        <h1 class="text-uppercase">Admin Portal</h1>
    </div>

</div>

<div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
            <a class="navbar-brand">
                {{$admin}}
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
                  <a class="nav-link active" href="#">{{$device['model'] ?? ''}} Gerätedetails <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>

          <div class="row">
              <div class="col-md-8 my-2" style="order: 2">

              <div class="card">
                <div class="card-header">
                    {{$device['model']}} - <b>{{$device['error']}}</b>
                    <a style="float: right;">{{$device['created_at']}}</a>
                </div>
                <div class="card-body">
                    <?php
                        $deviceId = $device['id'];
                    ?>
                <form method="POST" action="{{ url('/admin/updateDevice/'.$deviceId.'') }}">
            @csrf

            <div class="form-group row my-2">
                <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Hersteller') }}</label>

                <div class="col-md-6">

                    <input class="form-control text-center" type="text"  value="{{$device['brand']}}">

                    @error('model')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">

                <div class="col-md-9">
                    <input id="business" type="hidden"name="business"  value="{{$device['business']}}" required>

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
                    <textarea   id="description" class="text-center form-control" name="description" placeholder="Vorgeschichte">{{ $device['description'] }}</textarea>

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
                    <input class="form-control text-center" type="text"   value="{{$device['deviceStatus']}}">

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
                    <input placeholder="123456" id="pinCode" type="text" class="text-center form-control @error('pinCode') is-invalid @enderror" name="pinCode" value="{{ $device['pinCode'] }}" >
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
                    <input placeholder="1234" id="simCode" type="text" class="text-center form-control @error('simCode') is-invalid @enderror" name="simCode" value="{{ $device['simCode'] }}" >
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
                    <input placeholder="Keines" id="accessory" type="text" class="text-center form-control @error('accessories') is-invalid @enderror" name="accessories"   value="{{ $device['accessories'] }}" >

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
                       <?php
                            if($device['dataReovery'] == 1){
                                echo "Ja!";
                            }else{
                                echo "Nein!";
                            }
                       ?>
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
                    <input placeholder="353915102043702" id="imei"   type="text" class="text-center form-control @error('imei') is-invalid @enderror" name="imei" value="{{ $device['imei'] }}" >

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
                    <input placeholder="99€" id="price" type="text" class="text-center form-control @error('price') is-invalid @enderror" name="price"   value="{{ $device['price'] }}" >

                    @error('imei')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row mb-0 my-2">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('speichern') }}
                    </button>
                </div>
            </div>
        </form>
                </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                  <div class="card">
                      <div class="card-header">
                      <a href="../../device/pdf/{{$device->id}}" class="btn btn-primary">PDF</a>                      </div>
                      <div class="card-body">
                      <form method="POST" action="{{ url('storeComment') }}">
                       @csrf
                       <div class="form-group row my-2">

                            <input name="deviceId" type="hidden" value="{{$device['id']}}">
                            <input name="writter" type="hidden" value="{{$admin}}">


                            <div class="col">
                                <textarea id="comment" class="text-center form-control" name="comment" placeholder="Kommentar" autofocus></textarea>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="readable">
                                             <label class="form-check-label" for="flexCheckChecked">
                            Show Comment to Customer?!
                        </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Kommentar!</button>
                      </form>
                      </div>
                      <?php
                        if(sizeof($comments) == 0){
                            echo "<a class='text-center m-3'>Es gibt noch keinen Kommentar</a>";
                        }else{
                          ?>

                                    @foreach ($comments as $comment)
                                    <div class="position-relative">
                                        <h5 class="text-center m-2"> {{$comment->writter}} </h5>
                                        <a class="position-absolute end-0" style="margin-right: 20px;" href="/admin/deleteComment/{{$comment->id}}">Delete?</a>
                                        <p class="text-center">
                                            {{$comment->comment}}
                                        </p>

                                        </div>
                                    @endforeach
                          <?php
                        }
                      ?>
                  </div>
                  <div class="card mt-2">
                      <div class="card-header">
                          <?php
                                $status = $device->status;
                          ?>
                          Device Status ({{$status}})
                      </div>
                      <div class="card-body">
                          <?php
                                if($status == "finished"){
                                    echo '
                                    <a href="../../admin/openDevice/'.$device->id.'" class="btn btn-success">Open this device</a>
                                    ';
                                }else{
                                   echo '
                                   <a href="../../admin/closeDevice/'.$device->id.'" class="btn btn-danger">Close this device</a>
                                    ';
                                }
                          ?>
                      </div>
                  </div>
              </div>
          </div>

@endsection
