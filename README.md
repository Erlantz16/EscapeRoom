# Escape Room: CITT Txurdinaga

Txurdinagako Telekomunikazio Zientziaren Inteligentzia Zentroan (CITT), mezu ezezagun bat jaso dugu, eta
momentu honetan, mezuaren zati bat ezagutzeko lortu dugu bakarrik.


## 📑 Aurkibidea

1. [Deskribapena](#-1.Deskribapena)
2. [Instalazioa](#-2.Instalazioa)
3. [Garatzaileak](#-3.Garatzaileak)


## 1.Deskribapena

Txurdinagako Telekomunikazio Zientziaren Inteligentzia Zentroan (CITT), mezu ezezagun bat jaso dugu, eta
momentu honetan, mezuaren zati bat ezagutzeko lortu dugu bakarrik.

Jakin da mezuak antena parabolikoen kokapena eta orientazioa dauzka, baina parametroak ezeztatuta daude.
Gainera, elementu elektroniko bati energia aurreziz temperaturaigoa eskuratzeko konfigurazioa bidaltzea
eskatzen zaigu, eta hau horrela eginik, neguan gasto energetikoa erdia gutxituz, aurrezte energetiko
ikaragarrizkoa lortu eta ingurumenaren eragina murriztea.

Momentu honetan ez da lortu elementu edo gailuaren eredua ezagutzea edo kontrolatzeko edo egokitzea,
instalatu beharreko tresna hauetan parametro hau estabilizatzen duen elementuaren eredua, baina jakin da
informazio hori gorde eta aurkitu daitekeela.

Gure zentroko ikertzaile gisa, jasotako komunikazioa aztertu eta behar den elementuaren
eredua bidali beharko duzu, elektronikoaren eremua hobetzeko gailua elikatuko duen tresna hura osatzeko.

## 2.Instalazioa

Hauek dira gure proiektua desplegatzeko pausuak:

**1. pausua:** <br>
Xampp barruan dagoen "htdocs" karpetan,sortu karpeta berri bat eta ireki Visual Studio Code-n.
Datu basea sortu phpmyAdmin escape_room izenarekin eta importatu .sql artxiboa
Terminal berri bat ireki  Visual Studio Code-n eta ipini komando hau:

```
git clone https://github.com/2324-EscapeRoom-2DW3/T2-2DW3D.git
```

**2. pausua:** <br>
Vs code ireki, eta _CTRL + Ñ_ egin edo terminala ireki:

```
cd .\T2-2DW3D\escape_room\
```

**3. pausua:** <br>
Proiekturako gauzak deskargatu:

```
composer install
npm install
```

**4. pausua:** <br>
_.env_ fitxategia sortu

```
cp .env.example .env
```

**5. pausua:** <br>
Email-en bidalketa eta datu-basearekin funtzionatzeko _.env_ fitxategia editatu behar da eta DB_DATABASE tokian datubasearen izena ipini beharko da edo egin copy-paste bat.

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

**6. pausua:** <br>
ADI: xampp a exekutatzen egon behar da, bai _Apache_, bai _MySQL_:

**7. pausua:** <br>
Proiektua exekutatzeko

```
cd .\T2-2DW3D\escape_room\
php artisan serve
npm run dev
```

## 3.Garatzaileak

- **Erlantz Barriuso**
- **Gaizka Miralles**
- **Aimar Linaje**
- **Javier Andia**


