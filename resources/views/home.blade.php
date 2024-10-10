@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Página Inicial")
@section('content')
    <section id="headline">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-info">{{ __("Transformando vidas através da inclusão digital e inovação tecnológica") }}</h1>
                    <h3>{{ __("Participe de uma comunidade que está mudando o futuro através do conhecimento digital") }}</h3>
                    <a class="btn btn-lg btn-success" href="#">{{ __("Junte-se a nós:") }}</a>
                </div>
            </div>
        </div>
    </section>
@stop