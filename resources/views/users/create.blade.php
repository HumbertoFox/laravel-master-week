@extends('layouts.admin')

@section('content')
    <div class="card my-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Cadastrar Usuários</span>
            <span class="ms-auto">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">Listar</a>
            </span>
        </div>

        <div class="card-body">
            <x-alert />

            <form action="{{ route('user.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="Nome Completo"
                        value="{{ old('name') }}">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="Melhor E-Mail do Usuário" value="{{ old('email') }}">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
