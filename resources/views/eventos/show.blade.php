@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Visualizar Evento")
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Sobre o Evento') }}</h5>
                        <p class="card-text">
                            {{ __('Verifique os dados referentes ao evento.') }}
                        </p>
                        <div class="mb-3">
                            <label for="titulo" class="form-label"><strong>Titulo</strong></label>
                            <br/>{{ $evento->titulo }}
                        </div>

                        <div class="mb-3">
                            <label for="evento" class="form-label"><strong>Descrição do Evento</strong></label>
                            <br/>{{ $evento->evento }}
                        </div>

                        <div class="mb-3">
                            <label for="data" class="form-label"><strong>Data</strong></label>
                            <br/>{{ $evento->data }}
                        </div>

                        <div class="mb-3">
                            <label for="hora" class="form-label"><strong>Hora</strong></label>
                            <br/>{{ $evento->hora }}
                        </div>

                        <div class="mb-3">
                            <label for="local" class="form-label"><strong>Local</strong></label>
                            <br/>{{ $evento->local }}
                        </div>
                        <br/>
                        <a class="text-warning text-decoration-none"  href='{{ route("eventos.edit", $evento->id)}}'>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form class="d-inline" action="{{ route("eventos.destroy", $evento->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-danger text-decoration-none border-0 bg-white" type="submit">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection