<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erabiltzailearen datuak aldatu</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <script>
        $(function() {
            $("#cambioDatos").draggable({ containment: "#containerDatos", scroll: false });
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fondoMenu: '#333745',
                        fondoWeb: '#E63462'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-fondoWeb">
    @include('partials.header')

    <div id="containerDatos" class="h-full w-full fixed flex items-center justify-center">
        @auth
            <div id="cambioDatos" class="bg-fondoMenu w-96 flex flex-col items-center rounded-md px-6 ease-in-out duration-300 transition-transform transform hover:shadow-lg hover:shadow-[#F3F3F3] cursor-move">
                <br>
                <form action="{{ route('guardar-cambios', $usuario->id) }}" method="post" class="w-full">
                    @csrf
                    @method('put')
                    <div class="flex items-center w-full mb-4">
                        <label class="inline-block">Izena:</label>
                        <input type="text" placeholder="{{ $usuario->name }}" class="w-full inline-block rounded-md px-2 py-1 ml-2" name="name">
                    </div>

                    <div class="flex items-center w-full mb-4">
                        <label class="inline-block">Email:</label>
                        <input type="text" placeholder="{{ $usuario->email }}" class="w-full inline-block rounded-md px-2 py-1 ml-2" name="email">
                    </div>

                    <div class="flex items-center w-full mb-4">
                        <label class="inline-block">Pasahitza:</label>
                        <input type="password" placeholder="**********" class="w-full inline-block rounded-md px-2 py-1 ml-2" name="password">
                    </div>

                    <p class="text-neutral-400">Puntuazioa: {{$puntuacion->puntuacion}}</p>
                    <br>

                    <div class="w-full flex justify-between">
                        <a href="{{ route('perfil.show') }}"><button type="button" class="bg-fondoWeb text-white px-2 py-1 rounded-md">Perfilera bueltatu</button></a>
                        <input type="submit" class="bg-fondoWeb text-white px-2 py-1 rounded-md" value="Aldaketak gorde">
                    </div>
                </form>
                <br>
            </div>
        @endauth
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erabiltzailearen datuak aldatu</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fondoMenu: '#333745',
                        fondoWeb: '#E63462'
                    }
                }
            }
        }

    </script>

    <style>
        :root {
            --main-color: #333745;
            --text-color: #ffffff;
            --button-color: #333745;
            /* Color del botón */
            --button-hover-color: #E63462;
            /* Color del botón al pasar el mouse */
        }

        body {
            background: url('./images/fondoSala.jpg') no-repeat center center fixed;
            background-size: cover;
            color: var(--text-color);
            font-family: 'Zen Dots', cursive;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--text-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }

        .button-color {
            background-color: var(--button-color);
            color: var(--text-color);
        }

        .button-color:hover {
            background-color: var(--button-hover-color);
        }

        .custom-input {
            background-color: var(--fondoMenu);
            color: var(--text-color);
            border: 2px solid var(--button-color);
            border-radius: 0.25rem;
            padding: 0.5rem;
            margin: 0.5rem 0;
        }

    </style>

</head>

<body class="bg-fondoWeb">
    @include('partials.header')
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-4">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-4">
                <!-- Profile Card -->
                <div class="bg-fondoMenu p-3">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto" src="../images/usuarioIcono.avif" alt="">
                    </div>
                    <h1 class="text-white font-bold text-xl leading-8 my-1">{{ $usuario->name }}</h1>
                    <li class="flex items-center py-3">
                        <span> Estado</span>
                        <span class="ml-auto"><span
                                class="bg-fondoWeb py-1 px-2 rounded text-white text-sm">Active</span></span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>Puntuazioa</span>
                        <span class="ml-auto">{{$puntuacion->puntuacion}}</span>
                    </li>
                    <form id="cambios-puntuacion" action="{{ route('reiniciar.puntuacion', $usuario) }}" method="post">
                    @csrf
                    <button type="submit" onclick="confirmChangesPoint(event)" class="bg-fondoWeb text-white px-2 py-1 rounded-md">Reiniciar Puntuación</button>
                    </form>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-4 h-64">
                <!-- Profile tab -->
                <!-- Erabiltzailea Section -->
                <!-- Erabiltzailea Section -->
                <div class="bg-fondoMenu p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-white leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Erabiltzailea</span>
                    </div>
                    <div class="text-gray-700">
                        <form id="cambios-form" method="post" action="{{ route('guardar-cambios', $usuario->id) }}">
                            @csrf
                            @method('put')
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold text-white">Erabiltzaile izena</div>
                                    <input type="text" name="name" value="{{ $usuario->name }}" class="custom-input" />
                                </div>
                            </div>
                            <button type="submit" onclick="confirmChanges(event)"
                                class="block w-full button-color text-sm font-semibold rounded-lg hover:fondoWeb focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Datuak
                                Aldatu</button>
                        </form>
                    </div>
                </div>
                <!-- End of Erabiltzailea section -->

                <!-- End of Erabiltzailea section -->
                <div class="my-4"></div>
                <!-- Email eta pasahitza Section -->
                <div class="bg-fondoMenu p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-white leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Email eta Pasahitza</span>
                    </div>
                    <div class="text-gray-700">
                        <form id="cambios-email" method="post" action="{{ route('guardar-cambios', $usuario->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="grid md text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold text-white">Email</div>
                                    <input type="text" name="email" value="{{ $usuario->email }}"
                                        class="custom-input" />
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold text-white">Pasahitza</div>
                                    <input type="password" name="password" value="************" class="custom-input" />
                                </div>
                            </div>
                    </div>
                    <button type="submit" onclick="confirmChangesEmail(event)"
                        class="block w-full button-color text-sm font-semibold rounded-lg hover:fondoWeb focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Datuak
                        Aldatu</button>
                    </form>
                </div>
                <!-- End of Email eta pasahitza section -->
                <div class="my-4"></div>
                <!-- Kontua Ezabatu Section -->
                <div class="bg-fondoMenu p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-white leading-8">
                        <span clas="text-green-500">

                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide hover:fondoWeb" ">Kontua Ezabatu</span>
                    </div>
                    <div class="text-gray-700">
                        <form id="delete-form" method="post" action="{{ route('profile.destroy', $usuario->id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold text-white">Botoi honekin zure kontua ezabatu
                                        egingo
                                        duzu</div>
                                </div>
                            </div>
                    </div>
                    <button type="button" onclick="confirmDelete()"
                        class="block w-full button-color text-sm font-semibold rounded-lg hover:fondoWeb focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Kontua Ezabatu</button>
                    </form>
                </div>
                <!-- End of Kontua Ezabatu section -->
            </div>
            <!-- End of Right Side -->
        </div>
    </div>
</body>

<script>
   function confirmDelete() {
        Swal.fire({
            title: '¿Ziur zaude kontua ezabatu nahi duzula?',
            text: "Hau ezin izango da desegin.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bai, kontua ezabatu'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    }

    
    function confirmChanges(event) {
        event.preventDefault(); // Detener el envío automático del formulario

        Swal.fire({
            title: '¿Aldaketa hauek gorde nahi dituzu?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Bai',
            cancelButtonText: 'Ezeztatu'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('cambios-form').submit();
            }
        });
    }

    function confirmChangesEmail(event) {
        event.preventDefault(); // Detener el envío automático del formulario

        Swal.fire({
            title: '¿Aldaketa hauek gorde nahi dituzu?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Bai',
            cancelButtonText: 'Ezeztatu'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('cambios-email').submit();
            }
        });
    }

    function confirmChangesPoint(event){
        event.preventDefault(); // Detener el envío automático del formulario

        Swal.fire({
            title: '¿Ziur zaude zure puntuazioa berrabiarazi nahi duzula?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Bai',
            cancelButtonText: 'Ezeztatu'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('cambios-puntuacion').submit();
            }
        });

    }
</script>


</script>
</html>
