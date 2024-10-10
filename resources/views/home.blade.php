@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Página Inicial")
@section('content')

    <section id="headline mb-3">
        <div class="context">
            <h1>{{  __("Transformando vidas através da Inclusão Digital e Inovação Tecnológica") }}</h1>
            <h3 class="text-dark text-center">{{ __("Participe de uma comunidade que está mudando o futuro através do conhecimento digital") }}</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
                <a class="btn btn-lg btn-success d-flex justify-content-center align-items-center" href="#" style="z-index: 10000">
                    {{ __("Junte-se a nós") }}
                    <span class="material-symbols-outlined"> chevron_right </span>
                </a>
                <a class="btn btn-lg btn-danger d-flex justify-content-center align-items-center" href="#" style="z-index: 10000">
                Sobre
                    <span class="material-symbols-outlined"> chevron_right </span>
                </a>
            </div>
        <!--            <div class="position-relative overflow-hidden p-3 p-md-5 mb-3 text-center bg-body-tertiary">
                        <div class="col-md-6 p-lg-5 mx-auto my-5">
                            
                        </div>
                    </div>-->
        </div>


        <div class="area" >
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
<!--        <div class="position-relative overflow-hidden p-3 p-md-5 mb-3 text-center bg-body-tertiary" style="background-image: url({{ asset("default/assets/img/fundo-moderno-de-linhas-e-pontos-de-conexao.jpg") }}); background-size: cover; background-repeat: no-repeat; background-blend-mode: multiply;">
<div class="col-md-6 p-lg-5 mx-auto my-5">
<h1 class="display-3 fw-bold">{{  __("Transformando vidas através da Inclusão Digital e Inovação Tecnológica") }}</h1>
<h3 class="fw-normal text-muted mb-3">{{ __("Participe de uma comunidade que está mudando o futuro através do conhecimento digital") }}</h3>
<div class="d-flex gap-3 justify-content-center lead fw-normal">
<a class="btn btn-lg btn-success" href="#">
                        {{ __("Junte-se a nós") }}
<span class="material-symbols-outlined"> chevron_right </span>
</a>
<a class="btn btn-lg btn-danger" href="#">
Sobre
<span class="material-symbols-outlined"> chevron_right </span>
</a>
</div>
</div>
<div class="product-device shadow-sm d-none d-md-block"></div>
<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>-->
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