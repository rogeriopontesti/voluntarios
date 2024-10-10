@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: " . $evento->titulo)
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h1>{{ $evento->titulo }}</h1>
                <p>{{ $evento->evento }}</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="@if($evento->foto == 'default/assets/img/icons/usuario.png') {{ asset($evento->foto) }} @else {{ asset($evento->foto) }} @endif" class="card-img-top" alt="{{ $evento->titulo }}" title="{{ $evento->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-start align-items-lg-start"><span class="material-symbols-outlined text-primary"> calendar_month </span> {{ date("d/m/Y", strtotime($evento->data)); }}</h5>
                        <h5 class="card-title d-flex justify-content-start align-items-lg-start"><span class="material-symbols-outlined text-primary"> alarm_on </span> {{ str_replace(":", "h", date("H:m", strtotime($evento->hora))) }}</h5>
                        
                        <p class="card-text my-3 d-flex justify-content-start align-items-lg-start"><span class="material-symbols-outlined text-danger"> where_to_vote </span> {{ $evento->local }}</p>
                        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection