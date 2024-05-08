<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            #particles-js {
                position: absolute;
                top: 0;
                left: 0;
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
                            fondoBtn: '#E63462',
                            fondoTexto:'#FFFFFF'
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-fondoWeb">
        <div class="text-fondoWeb h-screen sm:pt-0 dark:bg-gray-900 bg-fondoMenu">
            @include('partials/header')

            <div class="flex justify-center">
                <a href="portada">
                    <img src="images/logo.png" class="w-20 h-20 mt-16 fill-current text-fondoMenu hover:scale-125 ease-in-out duration-300"/>
                </a>
            </div>

            <br>

            <div class="flex justify-center">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-fondoWeb text-fondoTexto dark:bg-gray-800 shadow-md hover:shadow-xl hover:shadow-fondoMenu ease-in-out duration-300 overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
