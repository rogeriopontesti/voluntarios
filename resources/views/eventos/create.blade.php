@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Novo Evento")
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Novo Evento') }}</h5>
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

                        <form action="{{ route('eventos.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <img src="{{ asset("default/assets/img/icons/calendario.png") }}" class="img-thumbnail img-evento" width="200px">
                            <hr/>
                            <input type="file" name="foto" id="fotoEvento" accept="image/jpeg,image/jpg,image/png,image/gif" />
                            <hr/>
                            <div class="mb-3">
                                <label for="titulo" class="form-label text-bold">* Titulo</label>
                                <input type="hidden" name="slug">
                                <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" value="{{ old('titulo') }}">
                                @error('titulo')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label text-bold">* Data</label>
                                <input type="date" class="form-control @error('data') is-invalid @enderror" name="data" id="data" value="{{ old('data') }}">
                                @error('data')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hora" class="form-label text-bold">* Hora</label>
                                <input type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" id="hora"  value="{{ old('hora') }}">
                                @error('hora')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="local" class="form-label text-bold">* Local</label>
                                <input type="text" class="form-control @error('local') is-invalid @enderror" name="local" id="local" value="{{ old('local') }}">
                                @error('local')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_id" class="form-label text-bold">* UserID</label>
                                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                    <option value=""></option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nome }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="evento" class="form-label text-bold">* Sobre o Evento</label>
                                <textarea class="form-control @error('evento') is-invalid @enderror" name="evento" id="evento">{{ old('evento') }}</textarea>
                                @error('evento')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <a class="btn btn-sm btn-secondary" href="{{ route("eventos.index") }}">{{ __("Voltar") }}</a>
                            <button class="btn btn-sm btn-dark" type="submit">{{ __('Cadastrar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
