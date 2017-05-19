# Instrucciones de descarga #

Esta guía permite tener una idea del proceso que debe realizarse para descargar el proyecto y comenzar a modificarlo.

### Requisitos ###
* PHP versión 5.6 o superios
* Apache
* PostgreSQL
* Composer

### Clonar este repositorio ###
    $ git clone git@bitbucket.org:cuc_proyecto_bav/sisreclamosbav.git

### Instalando dependencias con Composer ###
Lo primero que debes hacer luego de descargar un proyecto existente a tu maquina local, es instalar las dependencias del proyecto con Composer.

Esto lo puedes hacer usando el siguiente comando en la consola, dentro de la carpeta raíz del proyecto:

    $ composer install

### Archivo de configuración de Laravel ###
Cada nuevo proyecto con Laravel, por defecto tiene un archivo .env con los datos de configuración necesarios para el mismo, cuando utilizamos un sistema de control de versiones como git, este archivo se excluye del repositorio por medidas de seguridad .

Sin embargo  existe un archivo llamado .env.example que es un ejemplo de como crear un el archivo de configuración, podemos copiar este archivo desde la consola con:

    $ cp .env.example .env

De esta forma ya tenemos el archivo de configuración de nuestro proyecto.

### Creando un nuevo API key ###
Por medidas de seguridad cada proyecto de Laravel cuenta con una clave única que se crea en el archivo .env al iniciar el proyecto. En caso de que el desarrollador no te haya proporcionado están información, puedes generar una nueva API key desde la consola usando:

    $ php artisan key:generate

### Servidor de desarrollo local ###

Si tiene PHP instalado localmente y desea utilizar el servidor de desarrollo integrado de PHP para servir a su aplicación, puede utilizar el comando artisan serve. Este comando iniciará un servidor de desarrollo en http: // localhost: 8000:

    $ php artisan servir