@extends('layouts.default.theme')
@section("title", env("APP_NAME") . " :: Lista de Usuários")
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ __('Usuários') }}</h5>
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
                            <a class="btn btn-md btn-success align-middle" href="{{ route('users.create') }}">
                                <span class="material-symbols-outlined align-middle">person_add</span> {{ __('Novo Usuário') }}
                            </a>
                        </h6>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Data de Criação</th>
                                    <th>Atualizado em</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                               @foreach($users as $user)
                                    <tr>
                                        <td><img src="{{ $user->foto  }}" alt="{{ $user->nome }}" title="{{ $user->nome }}" class="img-fluid img-thumbnail"/></td>
                                        <td>{{ date("d/m/Y H:m", strtotime($user->created_at))  }}</td>
                                        <td>{{ date("d/m/Y H:m", strtotime($user->updated_at)) }}</td>
                                        <td class="text-secondary">
                                            {{ $user->nome }}
                                            <a class="text-primary text-decoration-none"  href='{{ route("users.show", $user->id)}}'>
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a class="text-warning text-decoration-none"  href='{{ route("users.edit", $user->id)}}'>
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route("users.destroy", $user->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="text-danger text-decoration-none border-0 bg-white" type="submit">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-bold">{{ $user->email }}</td>
                                        <td class="text-bold">{{ $user->status }}</td>
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
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection