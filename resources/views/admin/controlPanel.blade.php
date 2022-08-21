

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <div class="logo"></div>
        <h1 class="text-uppercase">Control Panel</h1>
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
                  <a class="nav-link" href="/home">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/adminPanel">Control Panel(current)</a>
                </li>
              </ul>
            </div>
          </nav>

          <div class="row">
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header"><h4 class="text-center">Brands</h4></div>
                      <div class="card-body">
                          <?php

                         
                                if(sizeof($brands) == 0){
                                    echo "There is no brands yet!";
                                }else{
                                    ?>

                                    @foreach ($brands as $brand)
                                        <ul>
                                            <li>{{$brand->brandName}} <a href="/admin/deleteBrand/{{$brand->id}}">Delete?</a></li>
                                        </ul>
                                    @endforeach

                                <?php
                                }



                          ?>

                          <form action="{{ url('storeBrand') }}" method="POST">
                              @csrf
                              <input type="text" name="brandName" class="form-control" placeholder="Apple, Samsung...">
                              <button class="btn btn-primary mt-1">Add</button>
                          </form>
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
          location.href = 'admin/devices/search/'+keyword;
        }else{
          alert("search must be atleast 3 chars");
        }
      }
    </script>
@endsection
