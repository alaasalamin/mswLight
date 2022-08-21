

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
    <div style="    width: 300px;
                        height: 120px;
                        background: url('../../../img/logo.png') no-repeat center;
                        background-size: contain ;
                        margin-left: auto;
                        margin-right: auto;
                        margin-bottom: 10px;
                        margin-top: 20px;
        ">

        </div>
        <h1 class="text-uppercase">Techniker Portal</h1>
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
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">Search Results<span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
        <div class="row d-flex justify-content-center my-3">
            <div class="col-md-4 my-2 justify-content-center align-items-center">

                  <div class="card">
                    <div class="card-header d-flex">

                              <input placeholder="Suchgeräte" id="keyword" type="text" class="form-control text-center" >
                              <button onclick="search()" class="btn btn-primary mx-2">Suche</button>

                    </div>
                  </div>
            </div>
        </div>
        <div class="row justify-content-center d-flex">
            <div class="col-md-9">
                <div class="card" style="">

                    <div class="card-header">Results for ({{$keyword}})</div>

                    <h1 class="p-2">B2B Devices :</h1>

                    <?php
                    if(sizeof($devices) == 0){
                        echo '<h3 class="p-2">No Results Found!</h3>';
                    }else{
                    ?>

                    @foreach ($devices as $device)
                        <div class="card m-2">
                            <div class="card-header position-relative">
                                <h3>#{{$device->id}} <a class="text-decoration-none text-dark" href="../../../tech/device/{{$device->id}}">{{$device->model}} </a></h3>
                                <a class="text-decoration-none">Sent: {{$device->created_at}}</a>
                            </div>
                            <div class="card-body">
                                <p class="p-2">
                                    {{$device->description}}
                                </p>
                            </div>
                        </div>

                    @endforeach
                    <?php
                    }
                    ?>

                    <h1  class="p-2">B2C Devices :</h1>
                    <?php
                    if(sizeof($moonRepairDevices) == 0){
                        echo '<h3 class="p-2">No Results Found!</h3>';
                    }else{
                    ?>

                    @foreach ($moonRepairDevices as $moonRepairDevice)
                        <div class="card m-2">
                            <div class="card-header position-relative">
                                <h3>#{{$moonRepairDevice->id}} <a class="text-decoration-none text-dark" href="../../../tech/device/{{$moonRepairDevice->id}}">{{$moonRepairDevice->model}} {{$moonRepairDevice->customerName}}</a></h3>
                                <a class="text-decoration-none">Sent: {{$moonRepairDevice->created_at}}</a>
                                <a class="text-decoration-none position-absolute end-0">Techniker: {{$moonRepairDevice->tech}}</a>
                            </div>
                            <div class="card-body">
                                <p class="p-2">
                                    {{$moonRepairDevice->description}}
                                </p>
                            </div>
                        </div>

                    @endforeach
                    <?php
                    }
                    ?>

                    </div>

            </div>
        </div>
    </div>

    <script>
        function search(){
        let keyword = document.getElementById('keyword').value;
        let searchLength = keyword.length;
        if(searchLength >= 1){
          location.href = '../../../tech/devices/search/'+keyword;
        }
      }
    </script>
@endsection
