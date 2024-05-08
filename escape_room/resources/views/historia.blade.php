<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Irratia</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .texto {
            font-family: 'Zen Dots', cursive;
            font-size: 1.2rem;
            line-height: 1.5;
            white-space: pre-line;
            cursor: pointer;
        }

        .boton-continuar {
            font-family: 'Zen Dots', cursive;
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 16px;
            color: white;
            background-size: cover;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .boton-izquierda {
        right: auto;
        left: 20px;
        margin: 16px;
    }

    .hidden {
        display: none;
        }

    </style>
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

<body>
    <div class="flex h-screen relative">
        <div class="flex-1"
            style="background-image: url('{{ asset('images/fondo_historia.jpg') }}'); background-size: cover; background-position: center;">
        </div>
        <div class="flex-1 bg-fondoMenu text-white flex items-center justify-center p-8">
            <div class="texto" id="texto">
                Txurdinagako Telekomunikazio Zientziaren Inteligentzia Zentroan (CITT), mezu ezezagun bat jaso dugu, eta
                momentu honetan, mezuaren zati bat ezagutzeko lortu dugu bakarrik.

                Jakin da mezuak antena parabolikoen kokapena eta orientazioa dauzka, baina parametroak ezeztatuta daude.
                Gainera, elementu elektroniko bati energia aurreziz temperaturaigoa eskuratzeko konfigurazioa bidaltzea
                eskatzen zaigu, eta hau horrela eginik, neguan gasto energetikoa erdia gutxituz, aurrezte energetiko
                ikaragarrizkoa lortu eta ingurumenaren eragina murriztea.

                Momentu honetan ez da lortu elementu edo gailuaren eredua ezagutzea edo kontrolatzeko edo egokitzea,
                instalatu beharreko tresna hauetan parametro hau estabilizatzen duen elementuaren eredua, baina jakin da
                informazio hori gorde eta aurkitu daitekeela.

                Gure intelijentziaren zentroko ikertzaile gisa, jasotako komunikazioa aztertu eta behar den elementuaren
                eredua bidali beharko duzu, elektronikoaren eremua hobetzeko gailua elikatuko duen tresna hura osatzeko.
            </div>

            <button id="botonIrAPortada" class="boton-continuar boton-izquierda"
                style="background-image: url('{{ asset('images/cinta.png') }}');">
                <a href="portada">
                Volver</a>
            </button>
            <button id="botonContinuar" class="boton-continuar hidden"
                style="background-image: url('{{ asset('images/cinta.png') }}');">
                <!-- Puedes dejar el contenido del botón vacío o agregar un texto alternativo aquí -->
                <a href="juegos1">Continuar<a/>
            </button>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var texto = document.getElementById("texto");
            var botonContinuar = document.getElementById("botonContinuar");

            // Guardamos el texto completo fuera de la función
            var textoCompleto = texto.innerHTML.trim();

            // Variable para indicar si el proceso de escritura está activo
            var procesoActivo = true;

            // Función para escribir el texto letra por letra
            function escribirTexto(texto, velocidad) {
                texto.innerHTML = ""; // Limpiamos el contenido
                var i = 0;

                function escribirCaracter() {
                    if (i < textoCompleto.length && procesoActivo) {
                        texto.innerHTML += textoCompleto.charAt(i);
                        i++;
                        setTimeout(escribirCaracter, velocidad);
                    } else {
                        // Mostrar el botón al finalizar la escritura
                        botonContinuar.classList.remove("hidden");
                    }
                }

                escribirCaracter();
            }

            // Llamar a la función con la velocidad deseada (por ejemplo, 30 milisegundos)
            escribirTexto(texto, 10);

            // Agregamos un evento de clic al texto para mostrar todo y el botón
            texto.addEventListener("click", function () {
                procesoActivo = false; // Detener el proceso de escritura
                texto.innerHTML = textoCompleto; // Mostrar todo el texto de una vez
                botonContinuar.classList.remove("hidden"); // Mostrar el botón
            });
        });
    </script>
</body>

</html>
