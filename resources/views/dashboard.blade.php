@extends('layouts.app')

@section('title', 'Panel')

@section('content')
    <div class="tarjeta ancha">
        <h1>Hola, {{ auth()->user()->name }}</h1>
        <p class="intro">
            Sesión activa en el <strong>Servidor {{ config('app.site_id') }}</strong>.
            Refresca el navegador unas veces: el balanceador puede enviarte al otro nodo
            y tu sesión debe seguir válida, porque vive en la base de datos.
        </p>

        <div class="datos">
            <dl>
                <dt>Usuario</dt>
                <dd>{{ auth()->user()->email }}</dd>

                <dt>Servidor</dt>
                <dd>{{ config('app.site_id') }}</dd>

                <dt>Base de datos</dt>
                <dd>{{ config('database.connections.mysql.host') }}:{{ config('database.connections.mysql.port') }} / {{ config('database.connections.mysql.database') }}</dd>

                <dt>Hostname</dt>
                <dd>{{ gethostname() }}</dd>
            </dl>
        </div>

        <form class="salir" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
@endsection
