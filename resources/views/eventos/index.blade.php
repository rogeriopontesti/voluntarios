@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Lista de Eventos")
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Eventos') }}</h5>
                        <div class="card-text my-3 text-body-secondary">
                            {{ __('Nesta lista você poderá gerenciar todos os eventos disponíveis.') }}

                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            <a class="btn btn-md btn-success" href="{{ route('eventos.create') }}">
                                <i class="fa-regular fa-calendar-plus"></i> {{ __('Novo Evento') }}
                            </a>
                        </h6>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Data de Criação</th>
                                    <th>Atualizado em</th>
                                    <th>Criado por</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Horário</th>
                                    <th>Local</th>
                                    <th>Gerenciar</th>
                                </tr>
                                @foreach($eventos as $evento)
                                    <tr>
                                            <td><img src=@if($evento->foto == 'default/assets/img/icons/usuario.png') {{ asset($evento->foto) }} @else {{ asset($evento->foto) }} @endif" alt="{{ $evento->titulo }}" title="{{ $evento->titulo }}" class="img-fluid img-thumbnail" width="90px"/></td>
                                <td>{{ date("d/m/Y H:m", strtotime($evento->created_at))  }}</td>
                                <td>{{ date("d/m/Y H:m", strtotime($evento->updated_at)) }}</td>
                                <td>
                                            <button type="button" class="bg-white border-0 text-secondary d-flex justify-content-start" data-bs-toggle="modal" data-bs-target="#modal" data-url="{{  route("evento.proprietario", $evento->user->id) }}" data-name="{{  $evento->user->nome }}" onclick="javascript:getDadosProprietario(this);">
                                        <span class="material-symbols-outlined"> person </span> {{  $evento->user->nome }}
                                    </button>
                                </td>
                                <td class="text-bold">{{ $evento->titulo }}</td>
                                <td class="text-secondary">{{ $evento->evento }}</td>
                                <td>{{ date("d/m/Y", strtotime($evento->data)); }}</td>
                                <td>{{ date("H:m", strtotime($evento->hora)) }}</td>
                                <td>{{ $evento->local }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="bg-white border-0 text-primary d-flex justify-content-start" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal" 
                                                    data-url-show="{{ route("eventos.show", $evento->id)}}" 
                                                    data-url-edit="{{ route("eventos.edit", $evento->id)}}" 
                                                    data-url-destroy="{{ route("eventos.destroy", $evento->id) }}" 
                                                    data-name="{{  $evento->user->titulo }}" 
                                                    onclick="javascript:getDadosEvento(this);">
                                            <span class="material-symbols-outlined"> visibility </span>
                                        </button>
                                        <a class="text-warning text-decoration-none p-1"  href='{{ route("eventos.edit", $evento->id)}}'>
                                            <span class="material-symbols-outlined"> edit_square </span>
                                        </a>
                                        <form class="del" action="{{ route("eventos.destroy", $evento->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="confirm" value="{{ __("* Este evento será excluído e esta ação não poderá ser desfeita, deseja continuar?") }}"/>
                                            <button class="text-danger text-decoration-none border-0 bg-white" type="submit">
                                                <span class="material-symbols-outlined"> delete </span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 my-3">
                                            <div class="d-flex justify-content-center">{!! $eventos->links() !!}  </div>
    </div>
</div>
@endsection