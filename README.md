# Prueba técnica Enviame.io por AJ

## Requisitos
Se deben cumplir con los siguientes requisitos para poder correr correctamente el proyecto

- Docker
    Instalación [Docker Desktop](https://docs.docker.com/desktop/)

- Docker compose (En Windows y en Mac viene incluido en la suite Docker Desktop)
    Instalación [Docker Compose](https://docs.docker.com/compose/install/) 

## Instalación

- Se debe copiar el archivo .env.example y crear un archivo .env 

        cp .env.example .env

- Se debe editar el archivo .env y colocar los accesos a la BD

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

- Se debe crear la imagen de la aplicación con Docker Compose **Compilación** 
        
        docker-compose build app

- Se debe ejecutar la imagen creada en segundo plano con Docker Compose **Ejecución** 

        docker-compose up -d

- Se debe ejecutar la instalación de las dependencias del proyecto laravel 

        docker-compose exec app composer install

- Se debe generar una nueva key para la aplicación 

        docker-compose exec app php artisan key:generate

- Se debe ejecutar el comando para las migraciones de laravel

        docker-compose exec app php artisan migrate --seed

- Se deben generar los clientes y llaves para la autenticación Oaut2.0 para el API provista por passport de Laravel

        docker-compose exec app php artisan passport:install

- Se deben instalar dependencias de node para las vistas de blade

        docker-compose exec app npm install

        docker-compose exec app npm run dev

- Si todo ha salido bien y estas corriendo en un entorno local deberás visitar el http://localhost:8000
- Debes ir al link de registro y crear un usuario