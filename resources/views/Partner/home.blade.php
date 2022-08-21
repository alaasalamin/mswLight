@extends('layouts.app')

@section('content')

    <div class="text-center mb-4">
        <div class="logo"></div>
        <h1 class="text-uppercase">Partner Portal</h1>
    </div>

    <nav class="container navbar navbar-expand-lg navbar-light" style="background: #fff">
        <div class="container-fluid">
            <a class="navbar-brand">{{$partner}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#partnerNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="partnerNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/newDevice">Neues Gerät einschicken</a>
                    </li>

                </ul>
                <div class="d-flex">
                    <input class="form-control me-2 text-center" type="search" id="keyword" placeholder="Suchgeräte" aria-label="Search">
                    <button onclick="search()" class="btn btn-outline-dark" type="submit">Suche</button>
                </div>
            </div>
        </div>
    </nav>
    <script>
        function search(){
            let keyword = document.getElementById('keyword').value;
            let searchLength = keyword.length;
            location.href = 'devices/search/'+keyword;

        }
    </script>
@endsection
