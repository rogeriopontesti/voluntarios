@extends('layouts.default.theme')
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
                                </tr>
                               @foreach($eventos as $evento)
                                    <tr>
                                        <td><img src=@if($evento->foto =='default/assets/img/icons/usuario.png	') {{ asset($evento->foto) }} @else {{ url("eventos/" . $evento->foto) }} @endif" alt="{{ $evento->nome }}" title="{{ $evento->nome }}" class="img-fluid img-thumbnail" width="90px"/></td>
                                        <td>{{ date("d/m/Y H:m", strtotime($evento->created_at))  }}</td>
                                        <td>{{ date("d/m/Y H:m", strtotime($evento->updated_at)) }}</td>
                                        <td><a href="{{  $evento->user->id }}">{{  $evento->user->nome }}</a></td>
                                        <td class="text-bold">{{ $evento->titulo }}</td>
                                        <td class="text-secondary">
                                            {{ $evento->evento }}
                                            <a class="text-primary text-decoration-none"  href='{{ route("eventos.show", $evento->id)}}'>
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
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
                                        </td>
                                        <td>{{ date("d/m/Y", strtotime($evento->data)); }}</td>
                                        <td>{{ date("H:m", strtotime($evento->hora)) }}</td>
                                        <td>{{ $evento->local }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <div class="d-flex justify-content-center">
                    {!! $eventos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection