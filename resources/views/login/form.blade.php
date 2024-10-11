@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Login")
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Login') }}</h5>
                        <p class="card-text">
                            {{ __('Por favor, informe suas credênciais.') }}
                        </p>

                        @if (session('error')) 
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())    
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {!! $error !!}
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route("login.auth") }}" method="post">
                            <div class="mb-3">
                                @csrf
                                <label for="email" class="form-label">{{ __("Email") }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                        @error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __("Senha") }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"" name="password" id="password">
                        @error('password')
                            <small class="text-danger text-bold">{{ $message }}</small>
                        @enderror
                        </div>
                            <button type="submit" class="btn btn-primary">{{ __("Entrar") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection