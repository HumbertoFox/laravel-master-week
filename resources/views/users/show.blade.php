@extends('layouts.admin')

@section('content')
    <div class="card my-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Detalhes do Usuários</span>
            <span class="ms-auto">
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm">Listar</a>

                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Tem certeza que deseja excluir este Usuário?')">
                        Excluir
                    </button>
                </form>
            </span>
        </div>

        <x-alert />

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $user->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3">E-Mail</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}</dd>
            </dl>
        </div>
    </div>
@endsection
