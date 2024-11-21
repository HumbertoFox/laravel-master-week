@extends('layouts.admin')

@section('content')
    <div class="card my-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Cadastrar Usuários</span>
            <span class="ms-auto">
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm">Listar</a>
                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Detalhes</a>
            </span>
        </div>

        <x-alert />

        <div class="card-body">
            <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="Nome Completo"
                        value="{{ old('name', $user->name) }}">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="Melhor E-Mail do Usuário" value="{{ old('email', $user->email) }}">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
