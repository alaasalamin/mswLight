

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <div class="logo"></div>
        <h1 class="text-uppercase">MoonRepair Portal</h1>
    </div>
    

</div>

    
<div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
            <a class="navbar-brand">
                {{$b2c}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="moonRepair/newDevice">Neues Gerät einschicken</a>
                </li>
              </ul>
            </div>
          </nav>
        <div class="row">
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="text-center card-header">
                      aktive Geräte
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        
                        <table class="table table-hover">
                            <tbody>
                              
                            
                              
                            </tbody>
                          </table>
                          
                      </blockquote>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 my-2 justify-content-center align-items-center">

                  <div class="card">
                    <div class="card-header d-flex">
                      
                            
                              <input placeholder="Suchgeräte" id="keyword" type="text" class="form-control text-center" >
                              <button onclick="search()" class="btn btn-primary mx-2">Suche</button>
                      
                    </div>
                  </div>
            </div>
            <div class="col-md-5 my-2">
                <div class="card">
                    <div class="text-center card-header">
                        Neue Geräte/nicht vergeben
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        
                        <table class="table table-hover">
                            <tbody>
                            <?php 
                              if(sizeof($newDevices) == 0){
                                echo "Es gibt noch keine Geräte";
                              }else{
                                ?>
                                  @foreach ($newDevices as $newDevice)
                                        <tr>
                                          <th scope="row">{{$newDevice->id}}</th>
                                          <td><a class="text-decoration-none" href="moonRepair/device/{{$newDevice->id}}">{{$newDevice->model}}</a></td>
                                          <td>{{$newDevice->error}}</td>
                                        </tr> 
                                  @endforeach
                                <?php
                              }
                            ?>
                            </tbody>
                          </table>
                          
                      </blockquote>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <script>
      function search(){
        let keyword = document.getElementById('keyword').value;
        let searchLength = keyword.length;
        if(searchLength >= 3){
          location.href = 'moonRepair/devices/search/'+keyword;
        }else{
          alert("search must be atleast 3 chars");
        }
      }
    </script>
@endsection
