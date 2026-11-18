<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Practica BD') &middot; Servidor {{ config('app.site_id') }}</title>
    <style>
        :root {
            --fondo: #f4f6f8;
            --tarjeta: #ffffff;
            --texto: #1f2933;
            --suave: #66727d;
            --acento: #2f6f4e;
            --borde: #dde3e8;
            --error: #b42318;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background: var(--fondo);
            color: var(--texto);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: var(--tarjeta);
            border-bottom: 1px solid var(--borde);
        }

        header .marca {
            font-weight: 600;
            letter-spacing: .02em;
        }

        .badge {
            display: inline-block;
            padding: .3rem .7rem;
            border-radius: 999px;
            background: #e7f0ea;
            color: var(--acento);
            font-size: .85rem;
            font-weight: 600;
            border: 1px solid #c9ddd1;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .tarjeta {
            background: var(--tarjeta);
            border: 1px solid var(--borde);
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 30px rgba(31, 41, 51, .06);
        }

        .tarjeta.ancha { max-width: 560px; }

        h1 {
            font-size: 1.35rem;
            margin: 0 0 .35rem;
        }

        p.intro {
            margin: 0 0 1.5rem;
            color: var(--suave);
            font-size: .95rem;
        }

        label {
            display: block;
            font-size: .9rem;
            font-weight: 600;
            margin-bottom: .35rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: .65rem .75rem;
            border: 1px solid var(--borde);
            border-radius: 8px;
            font-size: 1rem;
            background: #fff;
            color: inherit;
        }

        input:focus {
            outline: 2px solid #bcd6c7;
            border-color: var(--acento);
        }

        .campo { margin-bottom: 1rem; }

        .recordar {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .9rem;
            color: var(--suave);
            margin-bottom: 1.25rem;
        }

        button {
            width: 100%;
            padding: .75rem 1rem;
            border: 0;
            border-radius: 8px;
            background: var(--acento);
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover { background: #265c40; }

        .enlace {
            margin-top: 1.25rem;
            font-size: .9rem;
            color: var(--suave);
            text-align: center;
        }

        .enlace a { color: var(--acento); }

        .error {
            color: var(--error);
            font-size: .85rem;
            margin-top: .35rem;
        }

        .aviso {
            padding: .75rem 1rem;
            border-radius: 8px;
            background: #fdf1ef;
            border: 1px solid #f3c9c2;
            color: var(--error);
            font-size: .9rem;
            margin-bottom: 1rem;
        }

        .datos {
            border-top: 1px solid var(--borde);
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            font-size: .95rem;
        }

        .datos dl { margin: 0; display: grid; grid-template-columns: auto 1fr; gap: .5rem 1rem; }
        .datos dt { color: var(--suave); }
        .datos dd { margin: 0; font-weight: 600; }

        form.salir { margin-top: 1.5rem; }
        form.salir button { background: #47535e; }
        form.salir button:hover { background: #38424b; }
    </style>
</head>
<body>
    <header>
        <span class="marca">Practica BD</span>
        <span class="badge">Servidor {{ config('app.site_id') }}</span>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
