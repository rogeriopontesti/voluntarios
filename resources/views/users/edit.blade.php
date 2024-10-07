@extends('layouts.default.theme')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Editar Evento') }}</h5>
                        <p class="card-text">
                            {{ __('Por favor preencha todos os campos.') }}
                        </p>
                        @if ($errors->any())    
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {!! $error !!}
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('eventos.update', $evento->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="hidden" name="id" value="{{ old('id', $evento->id) }}">
                                <input type="hidden" name="slug" value="{{ old('slug', $evento->slug) }}">
                                <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" value="{{ old('titulo', $evento->titulo) }}">
                                @error('titulo')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="evento" class="form-label">Descrição do Evento</label>
                                <textarea class="form-control @error('evento') is-invalid @enderror" name="evento" id="evento">{{ old('evento', $evento->evento) }}</textarea>
                                @error('evento')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" class="form-control @error('data') is-invalid @enderror" name="data" id="data" value="{{ old('data', $evento->data) }}">
                                @error('data')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" id="hora" value="{{ date("H:m", strtotime(old('hora', $evento->hora))) }}">
                                @error('hora')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="local" class="form-label">Local</label>
                                <input type="local" class="form-control @error('local') is-invalid @enderror" name="local" id="local" value="{{ old('local', $evento->local) }}">
                                @error('local')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="btn btn-sm btn-dark" type="submit">{{ __('Salvar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


