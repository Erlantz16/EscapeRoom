<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">

  <link rel="stylesheet" href="{{asset('css/game.css')}}">
  <title>Wordle</title>
  @routes
  @vite(['resources/js/app.js','resources/css/game.css', 'resources/css/main.css']) 
</head>

<body class="body4">
  <div id="app2">
    <Juego4></Juego4>
  </div>
</body>

</html>