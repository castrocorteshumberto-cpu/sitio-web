# sitio-web

Contenido estático para la práctica de arquitectura de servidores con Nginx,
balanceo de carga y segmentación de red.

## Estructura

| Carpeta | Nodo | IP privada | Respuesta |
|---|---|---|---|
| `fh1/` | FH1 (`servidor2`) | 10.10.10.21 | Servidor 1 |
| `fh2/` | FH2 (`servidor3`) | 10.10.10.22 | Servidor 2 |

Un solo repositorio, dos raíces web. El balanceador alterna entre ambas.

## Topología

| Rol | VM | Usuario SSH | Puerto | IP privada |
|---|---|---|---|---|
| Bastión | original | `pesopluma` | 10777 | 10.10.10.10 |
| Load Balancer | `servidor1` | `santoslaguna` | 10881 | 10.10.10.11 |
| FH1 | `servidor2` | `adrianmarcelo` | 10167 | 10.10.10.21 |
| FH2 | `servidor3` | `harrypotter` | 10969 | 10.10.10.22 |

## Despliegue

Cada nodo clona el repositorio con su propia llave SSH de despliegue
(deploy key, solo lectura) y sirve su carpeta:

```bash
git clone git@github.com:USUARIO/sitio-web.git /var/www/sitio
```

Nginx en FH1 usa `root /var/www/sitio/fh1;` y en FH2 `root /var/www/sitio/fh2;`.

## Actualización

```bash
cd /var/www/sitio
git pull
```

Sin SFTP, sin HTTPS y sin copiar archivos a mano.
