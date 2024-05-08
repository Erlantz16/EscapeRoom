<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @routes
    <title>Juego 2</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        .body-blur {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.8);
        }

        #mensajeRadio {
            animation: mymove 2s linear infinite;
        }

        .izquierda {
            animation: desplaza 1.5s ease-in-out forwards;
        }

        .error {
            animation: ladoLado 2.5s ease-in-out forwards;
        }

        @keyframes ladoLado {
            0% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-5%);
            }
            50% {
                transform: translateX(10%);
            }
            75%{
                transform: translateX(-5%);
            }
            100%{
                transform: translateX(0);
            }
        }

        @keyframes mymove {
            0% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(15deg);
            }
            50% {
                transform: rotate(0deg);
            }
            75%{
                transform: rotate(-15deg);
            }
            100%{
                transform: rotate(0deg);
            }
        }

        @keyframes desplaza {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-50%);
            }
        }

        .fade-out {
            animation: fadeOut 1.5s ease-in-out forwards;
            opacity: 1;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }

        .fade-in {
            animation: fadeIn 1.5s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
    
</head>
<body id="body" style="background-image: url('{{ asset('images/fondoJuego2_out.jpg') }}'); background-size: cover;" class="body-blur">
    <main>
        <div id="app" class="h-screen w-screen inline-block -mt-2 -mr-2">
            <div id="volver" class="bg-red-400 hover:bg-red-600 text-white font-bold py-2 px-4 mt-32 left-2/3 rounded fixed" @click="accionVolver" v-show="muestraVolverBtn">
                <i class="fas fa-times"></i>
            </div>

            <div class="h-screen w-1/3 inline-block">
                <div id="containerReloj" class="border-dashed border-2 border-transparent h-24 w-40 ml-28 mt-28" :class="{ 'hidden': muestraVolver }" @click="accionReloj"></div>
            </div>

            <div class="h-screen w-1/3 inline-block">
                <div class="border-2 border-transparent h-72 w-72 m-auto mt-72 ml-40">
                    <div id="containerGlobo" class="border-dashed border-2 border-transparent h-24 w-40 mt-16 ml-10" :class="{ 'hidden': muestraVolver }" @click="accionGlobo"></div>
                    <div id="containerRadio" class="border-dashed border-2 border-transparent h-16 w-56 mt-4 ml-6" :class="{ 'hidden': muestraVolver }" @click="accionRadio"></div>
                </div>
            </div>

            <div class="h-screen w-1/5 inline-block">
                <div id="containerAntena" class="border-dashed border-2 border-transparent h-16 w-48 float-right mr-2 mt-80" :class="{ 'hidden': muestraVolver }" @click="accionAntena"></div>
            </div>

            <div id="mensaje" class="h-fit w-fit rounded-md border-2 border-black bg-black text-white font-bold py-2 px-4 fixed -ml-16 left-1/2 bottom-0 mb-40" :class="{ 'hidden': !muestraMensajeReloj }">10:10-ak dira</div>

            <img src="../public/images/reloj.png" alt="" id="reloj" class="floating-container h-96 w-96 fixed inset-1/2 transform -translate-x-1/2 -translate-y-1/2"  :class="{ 'hidden': !muestraMensajeReloj }">

            <img src="../public/images/radio.png" alt="" id="radio" class="floating-container h-80 w-80 fixed inset-1/2 transform -translate-x-1/2 -translate-y-1/2" :class="{ 'hidden': !muestraMensajeRadio }">

            <button id="volumenSube" class="h-10 w-12 rounded-full border-2 border-transparent fixed bottom-1/2 right-1/2 -mr-20 -mb-24" :class="{ 'hidden': !muestraMensajeRadio }" @mouseover="muestraVolumen" @mouseout="ocultaVolumen"></button>

            <button id="volumenBaja" class="h-8 w-12 rounded-full border-2 border-transparent fixed bottom-1/2 left-1/2 -ml-32 -mb-14" :class="{ 'hidden': !muestraMensajeRadio }" @mouseover="muestraVolumen" @mouseout="ocultaVolumen"></button>

            <progress id="barraVolumen" class="h-12 w-64 rounded-md border-2 border-black fixed bottom-1/2 right-1/2 -mr-96 -mb-6 transform -rotate-90" :class="{ 'hidden': !muestraBarraVolumen }" value="10" max="100"></progress>

            <div id="mensajeRadioAbajo" class="h-fit w-fit rounded-md border-2 border-black bg-black text-white font-bold py-2 px-2 fixed -ml-96 left-1/2 bottom-0 mb-48" :class="{ 'hidden': !muestraMensajeRadio }">Mezu bat bidaltzen ari dira zenbaki batekin behin eta berriro, irratiaren bolumena igo mezua entzuteko</div>

            <div id="mensajeRadio" class="h-fit w-fit rounded-md border-2 border-black bg-black text-white font-bold py-2 px-2 fixed -ml-6 left-1/2 top-0 mt-52" :class="{ 'hidden': !muestraMensaje }"><p>45.15</p></div>

            <div id="antena" class="h-32 w-32 rounded-md border-4 border-black bg-white fixed inset-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden"></div>

            <div id="mensajeMapa" class="h-fit w-fit rounded-md border-2 border-black bg-black text-white font-bold py-2 px-2 fixed -ml-40 left-1/2 bottom-0 mb-36" :class="{ 'hidden': !muestraMensajeMapa }">Mapa honetan puntu bat markatuta dago</div>

            <img id="globo" src="../public/images/globo.png" alt="" class="fixed inset-1/2 transform -translate-x-1/2 -translate-y-1/2" :class="{ 'hidden': !muestraMensajeMapa }">

            <img id="antena" src="../public/images/antena2.png" alt="" class="h-96 w-96 fixed top-1/2 left-1/2 -mt-48 -ml-48" :class="{ 'hidden': !muestraMensajeAntena }, { 'izquierda': animacionActiva }">

            <div id="mensajeAntena" class="h-fit w-fit rounded-md border-2 border-black bg-black text-white font-bold py-2 px-2 fixed -ml-80 left-1/2 bottom-0 mb-48" :class="{ 'hidden': !muestraMensajeAntena }">Satelite bidez bidali behar dituzu datuak, sartu antena ondo orientatzeko ajuste egokiak</div>

            <div id="cajaAntenaFinal" class="h-36 w-72 rounded-md border-4 border-yellow-900 bg-yellow-100 text-black font-bold py-2 px-2 fixed -mr-80 right-1/2 bottom-1/2 -mb-32" :class="{ 'hidden': !muestraCajaAntenaFinal }, { 'fade-in': animacionActiva }">
                <label class="ml-1">Koordenatuak:</label><input id="primeraCoordenada" pattern="[0-9]*" type="text" class="px-1 py-1 rounded-md text-xs inline-block border-2 border-black  w-14 h-fit mx-2"><label class="">,</label><input id="segundaCoordenada" pattern="[0-9]*" type="text" class="px-1 py-1 rounded-md text-xs inline-block border-2 border-black w-14 h-fit mx-2">

                <label class="ml-1 my-4">Azimut:</label><input id="primerAzimut" pattern="[0-9]*" type="text" class="px-1 py-1 rounded-md text-xs inline-block border-2 border-black  w-14 h-fit ml-2"><label class="ml-2  my-4">:</label><input id="segundoAzimut" pattern="[0-9]*" type="text" class="px-1 py-1 my-4 rounded-md text-xs inline-block border-2 border-black w-14 h-fit mx-2"><br>

                <label class="ml-1">Inklinazioa:</label><input id="inclinacion" pattern="[0-9]*" type="text" class="px-1 py-1 rounded-md text-xs inline-block border-2 border-black w-14 h-fit ml-2"><label class="ml-1">º</label>

                <button id="envio" class="border-2 border-gray-600 bg-gray-200 rounded-full h-8 w-12 ml-12" onclick="accionFinal()"><i class="fas fa-sync-alt"></i></button>
            </div>

            <button id="cajaAntena" class="h-12 w-36 rounded-full border-2 border-transparent fixed bottom-1/2 left-1/2 -ml-20 -mb-32" :class="{ 'hidden': !muestraCajaAntena }" @click="muestraCaja"></button>

            <div id="marker" class="h-3 w-3 rounded-full border-2 border-black bg-red-500 fixed inset-1/2 transform -translate-x-1/2 -translate-y-1/2 -ml-12 -mt-24" :class="{ 'hidden': !muestraMensajeMapa }" @mouseover="muestraCoordenadas" @mouseout="ocultaCoordenadas"></div>

            <div id="mensajeCoordenadas" class="h-fit w-fit rounded-md border-2 border-black bg-black text-white font-bold py-2 px-2 fixed -ml-8 left-1/2 bottom-1/2 mb-16 text-xs" :class="{ 'hidden': !muestraMensajeCoordenadas }">-64.247, -56.623</div>

            <div id="dialogBoxError" class="fixed top-0 -ml-52 mt-48 left-1/2 border-2 border-gray-400 bg-gray-100 rounded-md h-fit w-fit font-bold text-lg px-4 py-2" :class="{'hidden': !muestraCajaError}, {'fade-in': animacionEntra}, {'fade-out': animacionSale}">
                Erroreren bat daukazu, berrikusi sartutako datuak!
            </div>

            <div id="dialogBoxInicio" class="fixed top-0 -ml-96 mt-64 mr-96 left-1/2 border-2 border-gray-400 bg-gray-100 rounded-md h-64 w-fit text-lg px-4 py-2" :class="{'hidden': !muestraInicio}">
                <p class="text-xl text-center font-bold underline">Bigarren Froga</p><br>
                <p class="text-center font">Bigarren froga honetan, antenako ajuste egokiak sartu beharko dituzu. Horretarako, pistak bilatu behar izango dituzu gela honetan zehar.</p>
                <button class="border-2 border-black rounded-md bg-red-500 py-1 px-2 text-white font-bold w-24 h-fit mt-12 ml-80" @click="accionVolver">Hasi!</button>
            </div>

        </div>

    </main>
    <script src="https://unpkg.com/vue@3.2.19/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/scriptJuegos.js'])
    <!-- <script src="..\resources\js\scriptJuegos.js"></script> -->
</body>
   
</html>
