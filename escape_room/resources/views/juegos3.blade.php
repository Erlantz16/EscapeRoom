<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Irratia</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">
    @routes
    @vite(['resources/js/app.js','resources/css/main.css', 'resources/css/app.css', 'resources/css/game.css'])
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
<body class="text-white fondo3game">
    <div id="app2">
        <Juego3></Juego3>
    </div>
</body>
<style>
    .fondo3game {
        background-image: url('../public/images/game3.jpg');
    }
</style>
</html>
