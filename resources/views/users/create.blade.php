@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Novo Usuário")
@section('content')

    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Novo Usuário') }}</h5>
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

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <img src="{{ asset("default/assets/img/icons/usuario.png") }}" class="img-thumbnail" width="200px">
                                <hr/>
                                <input type="file" name="foto" accept="image/jpeg,image/jpg,image/png,image/gif"/>
                                <hr/>
                                <label for="nome" class="form-label text-bold">* Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" value="{{ old('nome') }}">
                                @error('nome')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nome" class="form-label text-bold">Nome social</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" value="{{ old('nome') }}">
                                @error('nome')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-bold">* Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label text-bold">* Senha</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">
                                @error('password')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="perfil" class="form-label text-bold">* Perfil</label>
                                <select class="form-control @error('perfil') is-invalid @enderror" name="perfil" id="perfil">
                                    @foreach(App\Enums\UserPerfisEnum::cases() as $perfil)
                                        <option value="{{ $perfil->name }}">{{ $perfil->value }}</option>
                                    @endforeach
                                </select>
                                @error('perfil')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tipo_de_usuario" class="form-label text-bold">* Tipo de Usuário</label>
                                <select class="form-control @error('tipo_de_usuario') is-invalid @enderror" name="tipo_de_usuario" id="tipo_de_usuario">
                                    @foreach(App\Enums\UserTipoUsuarioEnum::cases() as $tipoUsuario)
                                        <option value="{{ $tipoUsuario->name }}">{{ $tipoUsuario->value }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_de_usuario')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="area_de_atuacao" class="form-label text-bold">Área de Atuação</label>
                                <textarea class="form-control @error('area_de_atuacao') is-invalid @enderror" name="area_de_atuacao" id="area_de_atuacao">{{ old('area_de_atuacao') }}</textarea>
                                @error('area_de_atuacao')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="status" name="status" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                Checked checkbox
                                </label>
                            </div>
                            <button class="btn btn-sm btn-dark" type="submit">{{ __('Cadastrar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
