@extends('layouts.default.theme')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Eventos') }}</h5>
                        <p class="card-text">
                            {{ __('Nesta lista você poderá gerenciar todos os eventos disponíveis.') }}
                        </p>
                        <h6 class="card-subtitle mb-2 text-body-secondary"><a class="btn btn-sm btn-dark" href="{{ route('eventos.create') }}">Novo Evento<a></h6>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>id</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>titulo</th>
                                    <th>evento</th>
                                    <th>data</th>
                                    <th>hora</th>
                                    <th>local</th>
                                    <th>ações</th>
                                </tr>
                               @foreach($eventos as $evento)
                                    <tr>
                                        <td>{{ $evento->id }}</td>
                                        <td>{{ $evento->created_at }}</td>
                                        <td>{{ $evento->updated_at }}</td>
                                        <td>{{ $evento->titulo }}</td>
                                        <td>{{ $evento->evento }}</td>
                                        <td>{{ $evento->data }}</td>
                                        <td>{{ $evento->hora }}</td>
                                        <td>{{ $evento->local }}</td>
                                        <td class="d-inline-block">
                                            <a class="btn btn-sm btn-dark"  href='{{ route("eventos.edit", $evento->id)}}'>{{ __('Editar') }}</a>
                                            <form action="{{ route("eventos.destroy", $evento->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-dark" type="submit">{{ __('Excluir') }}</button>
                                            </form>

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
@stop