

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
                  <a class="nav-link" href="/admin/Partners">B2b Partners</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/admin/techs" ><span class="sr-only">(current)</span> Techniker</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/adminPanel">Control Panel</a>
                </li>
              </ul>
            </div>
          </nav>
        <div class="row">
            <div class="col-md-4 my-2">
                
            </div>
            
            <div class="col-md-4 my-2">
                
            </div>
        </div>
        <div class="row d-flex justify-content-center">
        <div class="col-md-9 my-2 ">
                <div class="card">
                    <div class="card-header text-center"><h3>{{$tech}}</h3></div>
                    <div class="card-body m-2 p-2">
                        @foreach ($devices as $device) 
                            <h4 class="text-center">#{{$device->id}} - <a href="../../admin/device/{{$device->id}}">{{$device->model}}</a></h4>
                            <p>{{$device->error}}</p>
                        @endforeach
                    </div>
                </div>
        </div>
        </div>
    </div>

    <script>
      function search(){
        let keyword = document.getElementById('keyword').value;
        let searchLength = keyword.length;
        if(searchLength >= 1){
          location.href = 'admin/partners/search/'+keyword;
        }else{
          alert("search must be atleast 3 chars");
        }
      }
    </script>
@endsection
