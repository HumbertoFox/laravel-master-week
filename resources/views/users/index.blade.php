@extends('layouts.admin')

@section('content')
    <div class="card my-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span>Listar Usuários</span>
            <span class="ms-auto">
                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
            </span>
        </div>

        <x-alert />

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="text-center">
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.show', ['user' => $user->id]) }}"
                                    class="btn btn-primary btn-sm">Detalhes</a>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir este Usuário?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="w-100 alert alert-danger text-center mt-1" role="alert">
                            <p>
                                Nehum Usuário encontrado!
                            </p>
                        </div>
                    @endforelse
                    </tr>
                </tbody>
            </table>

            {{ $users->links() }}

        </div>
    </div>
@endsection
