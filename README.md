# Prueba Examen Backend CAPI

Proyecto para examen BACKEND ALAN CUEVAS MELENDEZ.

## Requisitos previos

- PHP >= 8.1.0
- Composer
- MySQL 
- Node.js y npm (Opcional)

## Instalación


1. Instala las dependencias de Composer:

    ```bash
    composer install
    ```

2. Genera la clave de aplicación de Laravel:

    ```bash
    php artisan key:generate
    ```

3. Ejecuta las migraciones para crear las tablas de la base de datos:

    ```bash
    php artisan migrate
    ```
``

4. Ejecuta los seeder :

    ```bash
    php artisan db:seed --class=UserSeeder
    ```

    Visita [http://localhost:8000](http://127.0.0.1:8000) en tu navegador.




