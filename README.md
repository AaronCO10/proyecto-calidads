# Proyecto DonadoresPeru

Este es un proyecto de donación de sangre desarrollado con Laravel.

## Requisitos del Sistema

- PHP >= 7.4
- Composer
- Laragon (Recomendado para desarrollo local)
- MySQL

## Configuración del Entorno

1. Clona este repositorio en tu máquina local:

git clone <URL_DEL_REPOSITORIO>

2. Instala las dependencias del proyecto utilizando Composer:

composer install


3. Copia el archivo `.env.example` y renómbralo como `.env`:

cp .env.example .env


4. Genera la clave de aplicación:

php artisan key:generate


5. Configura tu base de datos en el archivo `.env`:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=nombre_de_usuario
DB_PASSWORD=contraseña


6. Ejecuta las migraciones para crear las tablas en la base de datos:

php artisan migrate


7. Ejecuta los seeders para llenar la base de datos con datos de ejemplo:

php artisan db:seed


## Usuarios por Defecto

El seeder crea dos usuarios por defecto:

1. Usuario Administrador:

- Correo Electrónico: admin@donadoresperu.com
- Contraseña: 123456789
- Nombre: Admin Admin
- DNI: 12345678
- Fecha de Nacimiento: 1990-01-01
- Sexo: Masculino
- Tipo de Sangre: O+
- Teléfono: 123456789

2. Usuario Donador:

- Correo Electrónico: luis@donadoresperu.com
- Contraseña: 123456789
- Nombre: Luis Pajares
- DNI: 87654321
- Fecha de Nacimiento: 1995-05-05
- Sexo: Masculino
- Tipo de Sangre: A-
- Teléfono: 987654321

## Ejecución del Proyecto

1. Inicia Laragon y asegúrate de que el servidor web y MySQL estén en ejecución.

2. Abre tu navegador web y navega a la URL de tu proyecto local (por ejemplo, http://proyecto.test).

¡Listo! Ahora deberías poder acceder y explorar el proyecto DonadoresPeru en tu entorno local.

