<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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

    <style>
         body {
            background: url('./images/fondoSala.jpg') no-repeat center center fixed;
            background-size: cover;

        }
    </style>

</head>

<body class="bg-fondoMenu text-white">
    @include("partials/header")

  

    <div class="flex flex-col justify-center items-center h-fit mt-10">

        <div class="relative flex w-6/12 h-[520px] flex-col rounded-t-2xl border-[1px] border-gray-200 bg-fondoMenu bg-clip-border shadow-md shadow-[#F3F3F3]">

            <div class="flex h-fit w-full text-center rounded-t-2xl bg-fondoBtn px-4 pb-[20px] pt-4 shadow-2xl shadow-gray-100">
                <h4 class="text-2xl w-full text-black font-bold text-navy-700 dark:text-black">JOKALARIEN PUNTUAZIO ALTUENAK</h4>
            </div>

            <div class="w-full h-full overflow-x-scroll md:overflow-x-hidden text-black">

                <table class="min-w-full bg-white border border-gray-300">
                    <tr class="text-xl h-1/10 bg-gray-500">
                        <th class="py-2 px-4 border-b border-gray-300 w-2/12">Posizioa</th>
                        <th class="py-2 px-4 border-b border-gray-300 w-5/12">Jokalaria</th>
                        <th class="py-2 px-4 border-b border-gray-300 w-5/12">Puntuak</th>
                    </tr>

                    @foreach ($usuarios as $index => $usuario)
                        @php
                            $num = $index + 1;
                        @endphp                       

                        <tr class="text-lg border-x-4">
                            <td class="py-2 px-4 border-b border-gray-300 w-2/12 text-center">{{$num}}</td>
                            <td class="py-2 px-4 border-b border-gray-300 w-5/12 text-center">{{$usuario->name}}</td>
                            <td class="py-2 px-4 border-b border-gray-300 w-5/12 text-center">{{$usuario->puntuacion}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </div>

    <br>
    <br>

    @include('partials.footer')
</body>

</html>
