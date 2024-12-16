
# Proyecto de Gestión de Servicios y Noticias

Este proyecto es una aplicación web que permite gestionar servicios y noticias, así como administrar usuarios y suscripciones.

## Funcionalidades

- **Gestión de Usuarios**: 
  - Se pueden crear, editar y eliminar usuarios.
  - Dos tipos de usuarios predefinidos:
    - **Admin**
      - Email: admin@gmail.com
      - Contraseña: 123456
    - **Usuario Común**
      - Email: usuarioComun@gmail.com
      - Contraseña: 123456
      - Datos de la tarjeta:
      - Mastercard
      - 5031 7557 3453 0604
      - 123
      - 11/25
      - Nombre del titular: APRO (para una transaccion exitosa).
      - DNI: 12345678
      - si deseas verificar que sucede si no ocurre una transaccion exitosa podes poner cualquier otra cosa.


            
            
            
  - Autenticación que valida la existencia del usuario y las credenciales de acceso.

- **Gestión de Servicios**:
  - Crear, editar y eliminar servicios.

- **Gestión de Noticias**:
  - Crear, editar y eliminar noticias.

- **Suscripciones**:
  - Visualización de cada usuario y sus detalles de suscripción a los servicios de hosting.
  - Validación de correos electrónicos para nuevos registros.

## Seeders

Los usuarios y las noticias se generan mediante seeders, lo que permite poblar la base de datos con datos iniciales de prueba.

## Registro de Usuario

El sistema de registro permite a los nuevos usuarios crear una cuenta, utilizando las validaciones pertinentes para garantizar que la información proporcionada sea correcta y que no existan cuentas duplicadas.

## Base de datos

Se debe contar con la base de datos creada llamada "hostengine" para que las tablas de las migraciones puedan ser creadas correctamente. (se utilizo phpmyadmin en el desarrollo)

## Instalación

Para configurar este proyecto en tu entorno local, sigue estos pasos:

1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   ```

2. Navega a la carpeta del proyecto:
   ```bash
   cd nombre-del-proyecto
   ```

3. Instala las dependencias de Composer:
   ```bash
   composer install
   ```

4. Crea las migraciones de la base de datos:
   ```bash
   php artisan migrate (tener en cuenta de que debe existir una base de datos llamada hostengine)
   ```

5. Utiliza los seeders para poblar la base de datos:
   ```bash
   php artisan db:seed
   ```

6. Inicia el proyecto:
   ```bash
   php artisan serve
   ```

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](LICENSE).
