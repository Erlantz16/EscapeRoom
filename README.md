# Escape Room: CITT Txurdinaga

En el Centro de Inteligencia en Telecomunicaciones de Txurdinaga (CITT), hemos recibido un mensaje desconocido y,
hasta el momento, solo hemos logrado descifrar una parte del mensaje.


## 📑 Índice

1. [Descripción](#-1.Descripción)
2. [Instalación](#-2.Instalación)

## 1.Descripción

En el Centro de Inteligencia en Telecomunicaciones de Txurdinaga (CITT), hemos recibido un mensaje desconocido y,
hasta el momento, solo hemos logrado descifrar una parte del mensaje.

Sabemos que el mensaje tiene información sobre la ubicación y orientación de antenas parabólicas, pero los parámetros
están ausentes. Además, se nos pide enviar una configuración para obtener un ahorro de energía previo a la temperatura
de un componente electrónico, lo que permite reducir a la mitad el consumo energético en invierno, logrando un ahorro 
energético significativo y reduciendo el impacto ambiental.

Hasta el momento, no hemos logrado identificar, controlar o adaptar el modelo de un elemento o dispositivo, pero se sabe
que esta información puede ser almacenada y encontrada en esta herramienta que estabiliza el parámetro en estos 
dispositivos que deben ser instalados.

Como investigador de nuestro centro, deberás analizar la comunicación recibida y enviar el modelo del elemento necesario
para mejorar el área electrónica que albergará el dispositivo que mejorará el ahorro energético.

## 2.Instalación

Estos son los pasos para desplegar el proyecto:


**Paso 1:** <br>
Dentro de la carpeta "htdocs" de Xampp, crea una nueva carpeta y ábrela en Visual Studio Code.
Crea una base de datos con phpMyAdmin llamada "escape_room" e importa el archivo .sql.
Abre una nueva terminal en Visual Studio Code y ejecuta el siguiente comando:

```
git clone https://github.com/2324-EscapeRoom-2DW3/T2-2DW3D.git
```

**Paso 2:** <br>
Abre Visual Studio Code, y presiona CTRL + Ñ o abre una nueva terminal:


```
cd .\T2-2DW3D\escape_room\
```

**Paso 3:** <br>
Descarga los recursos del proyecto:


```
composer install
npm install
```

**Paso 4:** <br>
Crea el archivo .env:


```
cp .env.example .env
```

**Paso 5:** <br>
Edita el archivo .env para que los envíos de correo electrónico y la comunicación con la base de datos funcionen. En la sección DB_DATABASE, asegúrate de escribir el nombre de la base de datos o haz copiar y pegar.
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=escape_room
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

**Paso 6:** <br>
NOTA: Xampp debe estar ejecutándose, tanto Apache como MySQL.


**Paso 7:** <br>
Para ejecutar el proyecto:


```
cd .\T2-2DW3D\escape_room\
php artisan serve
npm run dev
```

## Erlantz Barriuso

