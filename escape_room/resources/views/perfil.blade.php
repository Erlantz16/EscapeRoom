<!DOCTYPE html>
<html lang="eu">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Zen+Dots&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            #particles-js {
                position: absolute;
                top: 0;
                left: 0;
            }

            body {
            
            background: url('./images/fondoSala.jpg') no-repeat center center fixed;
            background-size: cover;
           
            }
        </style>

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            fondoMenu: '#333745',
                            fondoWeb: '#E63462',
                            fondoBtn: '#E63462'
                        }
                    }
                }
            }
        </script>
    </head>

<body >

    @include('partials.header')
    <div container="flex items-center justify-center h-screen">


    @auth
    <article class="bg-fondoMenu mt-5 w-96 flex items-center flex-col mx-auto rounded-md">
        <img src="images/usuarioIcono.avif" alt="" class="rounded-t-md">
        <br>
        <p class="text-white" style="font-family: 'Zen Dots', sans-serif;">Izena: {{ $usuario->name }}</p>
            <p class="text-white" style="font-family: 'Zen Dots', sans-serif;">Email: {{ $usuario->email }}</p>
        <p class="text-white" style="font-family: 'Zen Dots', sans-serif;">Puntuazioa: {{$puntuacion->puntuacion}}</p>
        <a href="{{ route('ErabiltzaileKudeaketa') }}" class="inline-block px-4 mt-5 py-2 bg-fondoBtn text-white rounded hover:bg-fondoWeb">Datuak Aldatu</a>
        <br>
    </article>
    @endauth
    </div>
</body>
</html>
