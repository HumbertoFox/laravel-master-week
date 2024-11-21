<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Login
    public function index()
    {
        // Carregar a view
        return view('login.index');
    }

    // Validar o usuário a senha do login
    public function loginProcess(LoginRequest $request)
    {
        // Validar o Formulário
        $request->validated();

        // Velidar o email e a senha com as informações no banco de dados
        $authenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Validar se o usuário foi autenticado
        if (!$authenticated) {
            // Redirecionar o usuário para página anterior "Login", enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou a senha inválida');
        }

        return redirect()->route('user.index');
    }

    // Deslogar o usuário
    public function destroy()
    {
        // Deslogando o Usuário
        Auth::logout();

        // Redirecionando o usuário, enviar a mensagem de sucesso
        return redirect()->route('login')->with('success', 'Deslogado com Sucesso!');
    }
}
