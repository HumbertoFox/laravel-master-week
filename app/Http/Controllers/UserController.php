<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    // Listas os Usuários
    public function index()
    {
        // Recuperar os regustros do banco de dados
        $users = User::orderByDesc('id')->paginate(10);
        // Carregar a view
        return view('users.index', ['users' => $users]);
    }

    // Detalhes do Usuário
    public function show(User $user)
    {
        // Carregar view
        return view('users.show', ['user' => $user]);
    }

    // Carregar o formulário cadastrar novo Usuário
    public function create()
    {
        // Carregar a view
        return view('users.create');
    }

    //Cadastrar novo registro no banco de dados
    public function store(UserRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Cadastrar o Usuário no Banco de dados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com Sucesso!');
    }

    // Carregar o formulário Editar Usuário
    public function edit(User $user)
    {
        // Carregar a view
        return view('users.edit', ['user' => $user]);
    }

    // Editar o registro no Banco de dados
    public function update(UserRequest $request, User $user)
    {
        // Validar os dados do formulário
        $request->validated();

        // Editar as informações do registro no banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirecionar o usuário, e enviar a mensagem de sucesso
        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário editado com Sucesso!');
    }

    // Exckuir o registro do usuário no banco de dados
    public function destroy(User $user)
    {
        // Excluir o registro no Bnaco de Dados
        $user->delete();

        // Redirecionar o usuário, e enviar a mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Usuário excluído com Sucesso!');
    }
}
