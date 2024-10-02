@extends('layouts.default.theme')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Editar Evento') }}</h5>
                        <p class="card-text">
                            {{ __('Por favor preencha todos os campos.') }}
                        </p>
                        <form action="{{ route('eventos.update', $evento->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $evento->titulo }}">
                            </div>

                            <div class="mb-3">
                                <label for="evento" class="form-label">Descrição do Evento</label>
                                <textarea class="form-control" name="evento" id="evento">{{ $evento->evento }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Data</label>
                                <input type="date" class="form-control" name="data" id="data" value="{{ $evento->data }}">
                            </div>

                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="time" class="form-control" name="hora" id="hora" value="{{ $evento->hora }}">
                            </div>

                            <div class="mb-3">
                                <label for="hora" class="form-label">Local</label>
                                <input type="local" class="form-control" name="local" id="local" value="{{ $evento->local }}">
                            </div>
                            <button class="btn btn-sm btn-dark" type="submit">{{ __('Cadastrar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


