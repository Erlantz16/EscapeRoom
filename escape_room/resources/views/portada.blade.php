<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ongi etorri</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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

<body>
    @include('partials.header')

    @auth
    <div class="flex justify-center items-center h-screen disabled">
        <div id="pantalla" class="radio-wrapper btn-container-large boton mt-10">
            <input type="radio" id="value-3" name="btn" class="input btn-large">
            <div class="btn btn-large" style="background-image: url({{ asset('images/cinta.png') }}); background-size: cover; background-color: transparent;">
                Jokuak<span aria-hidden=""></span>
                <span aria-hidden="" class="btn__glitch"></span>
                <div id="botones" class="hidden" style="z-index: 11">
                    @switch($puntuacion)
                    @case(0)
                    <a href="historia" class="btn-small btn-primary bg-fondoMenu" style="z-index: 11; display: inline-block; position: relative;">1. Jolasa</a>
                    <a href="segundaPrueba" class="btn-small btn-primary bg-fondoMenu opacity-50 pointer-events-none line-through" style="z-index: 11; display: inline-block; position: relative;" disabled> 2. Jolasa</a><br>
                    <a href="juegos3" class="btn-small btn-primary bg-fondoMenu opacity-50 pointer-events-none line-through" style="z-index: 11; display: inline-block; position: relative;" disabled>3. Jolasa</a>
                    <a href="juegos4" class="btn-small btn-primary bg-fondoMenu opacity-50 pointer-events-none line-through" style="z-index: 11; display: inline-block; position: relative;" disabled>4. Jolasa</a>
                    @break
                    @case(1)
                    <a href="historia" class="btn-small btn-primary bg-green-400 opacity-60 pointer-events-none" style="z-index: 11; display: inline-block; position: relative;">1. Jolasa</a>
                    <a href="segundaPrueba" class="btn-small btn-primary bg-fondoMenu" style="z-index: 11; display: inline-block; position: relative;">2. Jolasa</a><br>
                    <a href="juegos3" class="btn-small btn-primary bg-fondoMenu pointer-events-none opacity-50 line-through" style="z-index: 11; display: inline-block; position: relative;">3. Jolasa</a>
                    <a href="juegos4" class="btn-small btn-primary bg-fondoMenu pointer-events-none opacity-50 line-through" style="z-index: 11; display: inline-block; position: relative;">4. Jolasa</a>
                    @break
                    @case(2)
                    <a href="historia" class="btn-small btn-primary bg-green-400 pointer-events-none opacity-80" style="z-index: 11; display: inline-block; position: relative;" disabled>1. Jolasa</a>
                    <a href="segundaPrueba" class="btn-small btn-primary bg-green-400 pointer-events-none opacity-80" style="z-index: 11; display: inline-block; position: relative;" disabled>2. Jolasa</a><br>
                    <a href="juegos3" class="btn-small btn-primary bg-fondoMenu" style="z-index: 11; display: inline-block; position: relative;">3. Jolasa</a>
                    <a href="juegos4" class="btn-small btn-primary bg-fondoMenu pointer-events-none opacity-50 line-through" style="z-index: 11; display: inline-block; position: relative;" disabled>4. Jolasa</a>
                    @break
                    @case(3)
                    <a href="historia" class="btn-small btn-primary bg-green-400 pointer-events-none opacity-80" style="z-index: 11; display: inline-block; position: relative;">1. Jolasa</a>
                    <a href="segundaPrueba" class="btn-small btn-primary bg-green-400 pointer-events-none opacity-80" style="z-index: 11; display: inline-block; position: relative;">2. Jolasa</a><br>
                    <a href="juegos3" class="btn-small btn-primary bg-green-400 pointer-events-none opacity-80" style="z-index: 11; display: inline-block; position: relative;">3. Jolasa</a>
                    <a href="juegos4" class="btn-small btn-primary bg-fondoMenu" style="z-index: 11; display: inline-block; position: relative;">4. Jolasa</a>
                    @break
                    @case(4)
                    <a href="historia" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">1. Jolasa</a>
                    <a href="segundaPrueba" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">2. Jolasa</a><br>
                    <a href="juegos3" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">3. Jolasa</a>
                    <a href="juegos4" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">4. Jolasa</a>
                    @break
                    @case($puntuacion > 4)
                    <a href="historia" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">1. Jolasa</a>
                    <a href="segundaPrueba" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">2. Jolasa</a><br>
                    <a href="juegos3" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">3. Jolasa</a>
                    <a href="juegos4" class="btn-small btn-primary bg-green-300" style="z-index: 11; display: inline-block; position: relative;">4. Jolasa</a>
                    @endswitch
                </div>
            </div>
        </div>
        @endauth

        @guest
        <div class="flex justify-center items-center h-screen disabled w-full">
            <div id="pantalla" class="radio-wrapper btn-container-large boton mt-10">
                <input type="radio" id="value-3" name="btn" class="input btn-large">
                <div class="btn btn-large" style="background-image: url({{ asset('images/cinta.png') }}); background-size: cover; background-color: transparent;">
                    Jokuak<span aria-hidden=""></span>
                    <span aria-hidden="" class="btn__glitch"></span>
                    <div id="botones" class="hidden" style="z-index: 11"> <br>
                        <p class="text-sm text-zinc-800">Saioa hasi jokuak jokatzeko</p><br>
                        <a href="login" class="btn-small btn-primary bg-fondoMenu" style="z-index: 11; display: inline-block; position: relative;">HASI</a>
                        <a href="juegos5" class="btn-small btn-primary bg-fondoMenu" style="z-index: 11; display: inline-block; position: relative;">Demo Jokua</a>

                    </div>
                </div>
            </div>
        </div>
        @endguest


    </div>



    @include('partials.footer')
</body>


</html>


<style>
    body {
        background-image: url('images/fondo.png');
        background-size: cover;
        background-attachment: fixed;
        color: white;
    }

    .container {
        display: flex;
        flex-direction: row;
    }

    .radio-wrapper {
        position: relative;
        height: 38px;
        width: 84px;
        margin: 3px;
    }

    .radio-wrapper .input {
        position: absolute;
        height: 100%;
        width: 100%;
        margin: 0;
        cursor: pointer;
        z-index: 10;
        opacity: 0;
    }

    .btn {
        --color: 333745;
        --font-size: 9px;
        --shadow-primary-hue: 180;
        --shadow-secondary-hue: 60;
        --shadow-secondary: hsl(var(--shadow-secondary-hue), 90%, 60%);
        --clip: polygon(11% 0, 95% 0, 100% 25%, 90% 90%, 95% 90%, 85% 90%, 85% 100%, 7% 100%, 0 80%);
        --border: 5px;
        --shimmy-distance: 5;
        --clip-one: polygon(0 2%, 100% 2%, 100% 95%, 95% 95%, 95% 90%, 85% 90%, 85% 95%, 8% 95%, 0 70%);
        --clip-two: polygon(0 78%, 100% 78%, 100% 100%, 95% 100%, 95% 90%, 85% 90%, 85% 100%, 8% 100%, 0 78%);
        --clip-three: polygon(0 44%, 100% 44%, 100% 54%, 95% 54%, 95% 54%, 85% 54%, 85% 54%, 8% 54%, 0 54%);
        --clip-four: polygon(0 0, 100% 0, 100% 0, 95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);
        --clip-five: polygon(0 0, 100% 0, 100% 0, 95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);
        --clip-six: polygon(0 40%, 100% 40%, 100% 85%, 95% 85%, 95% 85%, 85% 85%, 85% 85%, 8% 85%, 0 70%);
        --clip-seven: polygon(0 63%, 100% 63%, 100% 80%, 95% 80%, 95% 80%, 85% 80%, 85% 80%, 8% 80%, 0 70%);
        color: var(--color);
        text-transform: uppercase;
        font-size: var(--font-size);
        letter-spacing: 3px;
        position: relative;
        font-weight: 900;
        width: 100%;
        height: 100%;
        line-height: 38px;
        text-align: center;
        transition: background 0.2s, 0.3s;
    }



    .btn:after,
    .btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        clip-path: var(--clip);
        z-index: -1;
    }

    .btn:before {
        background: var(--shadow-primary);
        transform: translate(var(--border), 0);
    }

    .btn:after {
        background: var(--primary);
    }

    .btn__tag {
        position: absolute;
        padding: 1px 4px;
        letter-spacing: 1px;
        line-height: 1;
        bottom: -5%;
        right: 5%;
        font-weight: normal;
        color: hsl(0, 0%, 0%);
        font-size: var(--label-size);
    }

    .btn__glitch {
        position: absolute;
        top: calc(var(--border) * -1);
        left: calc(var(--border) * -1);
        right: ca lc(var(--border) * -1);
        bottom: calc(var(--border) * -1);
        background: var(--shadow-primary);
        text-shadow: 2px 2px var(--shadow-primary), -2px -2px var(--shadow-secondary);
        clip-path: var(--clip);
        animation: glitch 2s infinite;
        display: none;
    }

    .input:hover+.btn .btn__glitch {
        display: block;
    }

    .input:checked+.btn .btn__glitch {
        display: block;
        animation: glitch 5s infinite;
    }

    .btn__glitch:before {
        content: '';
        position: absolute;
        top: calc(var(--border) * 1);
        right: calc(var(--border) * 1);
        bottom: calc(var(--border) * 1);
        left: calc(var(--border) * 1);
        clip-path: var(--clip);
        background: var(--primary);
        z-index: -1;
    }

    @keyframes glitch {
        0% {
            clip-path: var(--clip-one);
        }

        2%,
        8% {
            clip-path: var(--clip-two);
            transform: translate(calc(var(--shimmy-distance) * -1%), 0);
        }

        6% {
            clip-path: var(--clip-two);
            transform: translate(calc(var(--shimmy-distance) * 1%), 0);
        }

        9% {
            clip-path: var(--clip-two);
            transform: translate(0, 0);
        }

        10% {
            clip-path: var(--clip-three);
            transform: translate(calc(var(--shimmy-distance) * 1%), 0);
        }

        13% {
            clip-path: var(--clip-three);
            transform: translate(0, 0);
        }

        14%,
        21% {
            clip-path: var(--clip-four);
            transform: translate(calc(var(--shimmy-distance) * 1%), 0);
        }

        25% {
            clip-path: var(--clip-five);
            transform: translate(calc(var(--shimmy-distance) * 1%), 0);
        }

        30% {
            clip-path: var(--clip-five);
            transform: translate(calc(var(--shimmy-distance) * -1%), 0);
        }

        35%,
        45% {
            clip-path: var(--clip-six);
            transform: translate(calc(var(--shimmy-distance) * -1%));
        }

        40% {
            clip-path: var(--clip-six);
            transform: translate(calc(var(--shimmy-distance) * 1%));
        }

        50% {
            clip-path: var(--clip-six);
            transform: translate(0, 0);
        }

        55% {
            clip-path: var(--clip-seven);
            transform: translate(calc(var(--shimmy-distance) * 1%), 0);
        }

        60% {
            clip-path: var(--clip-seven);
            transform: translate(0, 0);
        }

        31%,
        61%,
        100% {
            clip-path: var(--clip-four);
        }
    }

    .number {
        background: var(--shadow-primary);
        color: #323232;
        font-size: 5.5px;
        font-weight: 700;
        letter-spacing: 1px;
        position: absolute;
        width: 15px;
        height: 6px;
        top: 0;
        left: 81%;
        line-height: 6.2px;
    }

    .btn-container-large {
        width: 350px;
        height: 90px;
    }

    .btn-large {
        font-size: 32px;
        padding: 20px;
    }

    .small-screen {
        width: 50%;
        height: 250px;
    }

    .hidden {
        display: none;
    }

    .btn-small {
        padding: 10px 20px;
        font-size: 16px;
        margin: 5px;
    }
</style>
<script>
    const pantalla = document.getElementById('pantalla');
    const btn = document.getElementById('value-3');
    const botones = document.getElementById('botones');

    btn.addEventListener('click', function() {
        pantalla.classList.add('small-screen');
        botones.style.display = 'block';
    });
</script>
