@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="tarjeta">
        <h1>Iniciar sesión</h1>
        <p class="intro">
            Atendido por el <strong>Servidor {{ config('app.site_id') }}</strong>.
            Necesitas una cuenta para ver el contenido.
        </p>

        @if ($errors->any())
            <div class="aviso">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="campo">
                <label for="email">Correo</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <label class="recordar">
                <input type="checkbox" name="remember" value="1">
                Recordarme
            </label>

            <button type="submit">Entrar</button>
        </form>

        <p class="enlace">
            ¿Sin cuenta? <a href="{{ route('register') }}">Regístrate</a>
        </p>
    </div>
@endsection
