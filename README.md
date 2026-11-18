# Practica BD - aplicacion dinamica

Aplicacion Laravel 12 que se ejecuta en los dos nodos web (FH1 y FH2) detras del
balanceador Nginx y guarda sus datos en una MariaDB 11.4 LTS ubicada en la red
privada.

## Arquitectura

```
navegador
    |
  balanceador (Nginx, least_conn)
    |
    +--> FH1  Laravel + PHP-FPM  (SITE_ID=1)
    +--> FH2  Laravel + PHP-FPM  (SITE_ID=2)
              |
          MariaDB 10.10.10.30:3316 (red privada)
```

## Variables de entorno

El archivo `.env` **no se versiona**. Cada nodo lo crea a partir de `.env.example`
y define su propio `SITE_ID`:

| Variable | Valor |
|---|---|
| `APP_KEY` | la misma en ambos nodos (necesario para compartir sesiones) |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `DB_HOST` | `10.10.10.30` |
| `DB_PORT` | `3316` |
| `DB_DATABASE` | `sitio` |
| `DB_USERNAME` | `app` |
| `DB_PASSWORD` | la de la cuenta de ejecucion |
| `SESSION_DRIVER` | `database` |
| `SITE_ID` | `1` en FH1, `2` en FH2 |

El identificador del servidor se expone en las vistas con
`config('app.site_id')`, no reemplazando el HTML.

## Cuentas de base de datos

| Cuenta | Permisos | Uso |
|---|---|---|
| `migra` | `ALL` sobre `sitio` | solo para `php artisan migrate` |
| `app` | `SELECT, INSERT, UPDATE, DELETE` sobre `sitio` | ejecucion normal |

Ambas estan restringidas por host a `10.10.10.21` (FH1) y `10.10.10.22` (FH2).

## Despliegue en un nodo

```bash
git clone git@github.com:castrocorteshumberto-cpu/sitio-web.git /var/www/sitio
cd /var/www/sitio
composer install --no-dev --optimize-autoloader
cp .env.example .env        # ajustar los valores de la tabla anterior
php artisan key:generate    # solo en el primer nodo; copiar APP_KEY al otro
php artisan migrate --force # ejecutar una sola vez con la cuenta migra
```

## Estructura

- `routes/web.php`: rutas de login, registro, panel y salida.
- `app/Http/Controllers/AuthController.php`: autenticacion con el guard de Laravel.
- `resources/views/layouts/app.blade.php`: plantilla base con el identificador.
- `resources/views/auth/`: formularios de inicio de sesion y registro.
- `resources/views/dashboard.blade.php`: panel posterior al login.
