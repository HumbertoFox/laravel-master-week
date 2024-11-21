<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>BetoFoxNet_Info</title>
</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center">
    <main class="d-flex flex-column align-items-center card p-4 shadow m-4">
        <img src="{{ asset('images/LOGO_BFN.png') }}" alt="Icon BetoFoxNet" width="130" height="130">
        <h1 class="mb-4 fw-normal">Login</h1>

        <x-alert />

        <form action="{{ route('login.process') }}" method="POST" class="d-flex flex-column gap-3">
            @csrf

            <div class="w-100 form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder
                    value="{{ old('email') }}">
                <label for="email">E-Mail</label>
            </div>

            <div class="w-100 form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder
                    value="{{ old('password') }}">
                <label for="password">Senha</label>
            </div>

            <button class="btn btn-primary py-2" type="submit">Acessar</button>

            <p class="my-3 text-body-secondary text-center">Esqueceu a Senha?</p>
            <p class="my-3 text-body-secondary text-center">
                Novo em BetoFoxNet <a href="#" class="text-decoration-none">
                    escolha seus serviços
                </a> para começar!
            </p>
        </form>
    </main>
</body>

</html>
