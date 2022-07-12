# Sistema Experto Enfermedades

Sistema experto web que conecta con prolog para realizar consultas a una base de conocimientos.

## Integrantes

- Cóndor García Daniel Josué
- Motta Loayza Paul Angelo
- Rueda Boada Ignacio Raúl

## Notas

1. Importar la base de datos.
2. Escribir los valores correspondientes al entorno en el archivo `.env`, donde:

- `GRUPO_01_ENFERMEDADES_HOST` es el host donde corre la base de datos
- `GRUPO_01_ENFERMEDADES_PORT` es el puerto donde corre la base de datos
- `GRUPO_01_ENFERMEDADES_NOMBRE_BD` es el nombre de la base de datos
- `GRUPO_01_ENFERMEDADES_USUARIO_BD` es el usuario de la base de datos
- `GRUPO_01_ENFERMEDADES_CONTRASENIA_BD` es la contraseña de la base de datos

Correr el servidor con el comando `php -S localhost:8000` en caso de no usar el contenedor de php.

También puedes configurar un contenedor de mysql usando `docker-compose up`
