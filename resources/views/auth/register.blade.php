@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="tarjeta">
        <h1>Crear cuenta</h1>
        <p class="intro">
            Registro atendido por el <strong>Servidor {{ config('app.site_id') }}</strong>.
        </p>

        @if ($errors->any())
            <div class="aviso">
                <ul style="margin:0; padding-left:1.1rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="campo">
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <div class="campo">
                <label for="email">Correo</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                <div class="error">Mínimo 8 caracteres.</div>
            </div>

            <div class="campo">
                <label for="password_confirmation">Repite la contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit">Registrarme</button>
        </form>

        <p class="enlace">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </p>
    </div>
@endsection
