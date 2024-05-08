<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <!-- Agrega el CDN de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Agrega la fuente de Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">

    <style>
        body {
            font-family: 'Zen Dots', cursive;
            background: url('./images/fondoSala.jpg') no-repeat center center fixed;
            background-size: cover;

        }

        .container {
           /* Cambia el color de fondo del contenedor a fondoBtn */
        }

        table {
            color: white; /* Cambia el color del texto de la tabla a blanco */
            font-family: 'Zen Dots', cursive;
            background-color: #333745; /* Cambia el color de fondo de la tabla a fondoMenu */
        }

        th,
        td {
            border: 1px solid white; /* Añade bordes blancos a las celdas */
            padding: 8px; /* Añade un relleno a las celdas */
        }

        th {
            background-color: #333745; /* Cambia el color de fondo de las celdas de encabezado a fondoMenu */
        }

        td {
            background-color: #333745; /* Cambia el color de fondo de las celdas de datos a fondoMenu */
        }

        button {
            background-color: #E63462; /* Cambia el color de fondo del botón a fondoBtn */
            color: white; /* Cambia el color del texto del botón a blanco */
        }


    </style>

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
    <script>

        // import route from '../../vendor/tightenco/ziggy';
        
        
         function confirmChanges(event, userId) {
                event.preventDefault(); // Detener el envío automático del formulario
        
                Swal.fire({
                    title: '¿Aldaketak gorde nahi dituzu?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Bai',
                    cancelButtonText: 'Ezeztatu'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Obtener el formulario por ID
                        var form = document.getElementById('cambios-form-' + userId);
                        // Enviar el formulario
                        form.submit();
                    }
                });
            }
        </script>
        
</head>

<body>
   
   
    @include("partials/header")

    <!-- Contenedor centralizado con márgenes -->
    <div class="container mx-auto my-8 p-4 rounded-md">
        <!-- Incluye la plantilla proporcionada -->
        <div class="usuarios-container p-4 rounded-md mx-[50px]">
            <h2 class="text-white  text-lg font-semibold pb-4">Erabiltzaileak</h2>
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th class="py-2 px-4 bg-fondoMenu font-bold uppercase text-sm text-white border-b border-white">
                            Argazkia</th>
                        <th class="py-2 px-4 bg-fondoMenu font-bold uppercase text-sm text-white border-b border-white">
                            Izena</th>
                        <th class="py-2 px-4 bg-fondoMenu font-bold uppercase text-sm text-white border-b border-white">
                            Rola</th>
                        <th class="py-2 px-4 bg-fondoMenu font-bold uppercase text-sm text-white border-b border-white">
                            Ekintza</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $users)
<tr class="hover:bg-grey-lighter">
    <td class="py-2 px-4 border-b border-white text-center">
        <div class="flex items-center justify-center">
            <img src="../public/images/usuarioIcono.png" alt="Foto Perfil" class="rounded-full h-10 w-10">
        </div>
    </td>
    <td class="py-2 px-4 border-b border-white text-center text-white">{{ $users->name }}</td>
    <td class="py-2 px-4 border-b border-white text-center">
        <form id="cambios-form-{{ $users->id }}" action="{{ route('usuarios.updateRol', $users->id) }}"
            method="post">
            @csrf
            @method('PUT')

            <select name="rol[{{ $users->id }}]" class="text-black">
                <option value="1" {{ $users->rol == 1 ? 'selected' : '' }}>Administratzailea</option>
                <option value="0" {{ $users->rol == 0 ? 'selected' : '' }}>Erabiltzailea</option>
            </select>
    <td class="py-2 px-4 border-b border-white text-center">
        <div class="inline-block">
            <button type="submit" onclick="confirmChanges(event, {{ $users->id }})"
                class="inline-block px-4 py-2 bg-fondoBtn text-white rounded hover:bg-fondoWeb"
                data-id="{{ $users->id }}" value="{{ $users->id }}">Eguneratu</button>
        </div>
        </form>
      
    </td>
</tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>
    
   

</body>
</html>
