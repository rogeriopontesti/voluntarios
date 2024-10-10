@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Página Inicial")
@section('content')
    <section id="headline">
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-info">{{ __("Transformando vidas através da inclusão digital e inovação tecnológica") }}</h1>
                    <h3>{{ __("Participe de uma comunidade que está mudando o futuro através do conhecimento digital") }}</h3>
                    <a class="btn btn-lg btn-success" href="#">{{ __("Junte-se a nós:") }}</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mb-3">
            <div class="row">
                @foreach($eventos as $evento)
                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <img src="{{ $evento->foto }}" class="card-img-top" alt="{{ $evento->titulo }}" title="{{ $evento->titulo }}">
                            <div class="card-body">
                                <h5 class="card-title" style="height: 50px">{{ Str::limit($evento->titulo, 50) }}</h5>
                                <p class="card-text">{{ Str::limit($evento->evento, 40) }}</p>
                                <a href="{{ route("evento", $evento->id) }}" class="btn btn-outline-dark d-flex justify-content-center align-items-center">Saiba mais <span class="material-symbols-outlined"> expand_content </span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop