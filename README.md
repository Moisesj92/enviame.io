# Prueba técnica Enviame.io por AJ

## Requisitos
Se deben cumplir con los siguientes requisitos para poder correr correctamente el proyecto

- Docker
    Instalación [Docker Desktop](https://docs.docker.com/desktop/)

- Docker compose (En Windows y en Mac viene incluido en la suite Docker Desktop)
    Instalación [Docker Compose](https://docs.docker.com/compose/install/) 

## Instalación

- Se debe copiar el archivo .env.example y crear un archivo .env (cp .env.example .env), luego se debe editar el archivo .env y colocar los accesos a la BD (nano .env) 

    APP_NAME=Enviame
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=enviame
    DB_USERNAME=enviame_user
    DB_PASSWORD=password

---

- Se debe crear la imagen de la aplicación con Docker Compose **Compilación** (docker-compose build app)

- Se debe ejecutar la imagen creada en segundo plano con Docker Compose **Ejecución** (docker-compose up -d)

- Se debe ejecutar la instalacion de las dependencias del proyecto laravel (docker-compose exec app composer install)

- Se debe generar una nueva key para la aplicacion (docker-compose exec app php artisan key:generate)

Si todo ha salido bien y estas corriendo en un etorno local deberas visitar el http://localhost:8000