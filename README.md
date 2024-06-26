<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About ProyectoPHP

esta deberia ser la descripcion del proyecto de php...


### Requisitos

- PHP >= 7.3
- Composer
- Servidor de base de datos (MySQL, PostgreSQL, SQLite, etc.)
- Servidor web (Apache, Nginx, etc.)

### Instalacion

1. Clona el repositorio.

```sh
git clone https://github.com/pabrax/proyectoPHP.git
```

2. Navega hasta el directorio del proyecto.

```sh
cd proyectoPHP
```

3. instala las dependecias con Composer.

```sh
composer install
```

4. instala las dependecias con npm.

```sh
npm install
```


5. copia el archivo de entono.

```sh
cp .env.example .env
```


6. Ejecuta las migraciones.
   
```sh
php artisan migrate
```


### Uso

Para iniciar el servidor de desarrollo Local de laravel:

```sh
php artisan serve
```

>Abre [http://localhost:8000](http://localhost:8000) en tu navegador para ver la aplicación.

Para iniciar el servidor de desarrollo Local de Vitejs:

```sh
npm run dev
```


### Folders

1. **app**: Este directorio contiene la lógica de la aplicación, incluyendo los controladores, modelos y clases de servicio.
2. **bootstrap**: Este directorio contiene los archivos de inicio de la aplicación, como el archivo app.php que carga las dependencias y configura la aplicación.
3. **config**: Aquí se encuentran los archivos de configuración de la aplicación, como las configuraciones de la base de datos, el correo electrónico y el caché.
4. **database**: Este directorio contiene las migraciones de la base de datos y los archivos de semillas para poblar la base de datos con datos de prueba.
5. **public**: Aquí se encuentran los archivos públicos accesibles desde la web, como las imágenes, hojas de estilo y scripts JavaScript.
resources: Este directorio contiene las vistas de la aplicación, así como los archivos de assets como CSS, JavaScript y archivos de traducción.
6. **routes**: Aquí se definen las rutas de la aplicación, que determinan cómo se manejan las solicitudes HTTP.
7. **storage**: Este directorio almacena archivos generados por la aplicación, como archivos de registro, sesiones y archivos cargados por los usuarios.
8. **tests**: Aquí se encuentran los archivos de prueba de la aplicación, que se utilizan para probar la funcionalidad de la aplicación.
9. **vendor**: Este directorio contiene las dependencias de Composer, que son las bibliotecas de terceros utilizadas por la aplicación.


