<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Letra Sopa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">

    @vite("resources/js/app.js")
    @routes
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.0.0/dist/vue.global.prod.js"></script>

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
<body class="text-white fondo5game">
    <div id="app2">
        <Juego5></Juego5>
    </div>
</body>
<style>
    .fondo5game {
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/game5fondo.jpg');
    }
</style>
</html>
