
<template >
     <div v-if="mostrarResumen" class="pagina-negra">
      <!-- Resumen del juego -->
      <h1 class="custom-style">¡Ongi etorri 1º jokura!</h1>
      <p class="custom-style"> Aurkitu ezkutuko sekretua igarkizunak eta konbinazioak ebatziz.</p>
      <p class="custom-style"> Arakatu gela, aurkitu pistak eta erabili zure asmamena aurrera egiteko.</p>
<p class="custom-style"> Prest al zaude erronkarako?</p>
      <button @click="iniciarJuego">Jokatu</button>
    </div>

    <div class="imagen-container" @click="pista()">
        <img src="../../public/images/bombilla.png" class="imagenbombilla">
    </div>


    <div id="ConfirmaPista" class="confirmation-box">
        <h2>Ziur zaude pista erabili nahi duzula?</h2>
        <div class="botones">
            <button id="yes-button" @click="BotonSi()">Bai</button>
            <button id="no-button" @click="BotonNo()">Ez</button>
        </div>
    </div>

    <div id="DivPista" class="EldivDelapistaNone">
        <div class="ContenidoPista">
            <h2>{{ frasePista }}</h2>
            <button id="no-button" @click="cerrarPista()">Itxi</button>
        </div>
    </div>

    <!-- <div class="main"> -->

        <div class="panel-led" id="leds">
            <div class="numeros">
                <span id="ceros" ref="valorCerosElement">{{ valorCeros }}</span>
                <span ref="emehachezeta">Mhz</span>
            </div>
        </div>
<div class="teclado-container teclado-abajo" id="Teclado">
  <div class="teclado">
    <button class="tecla" @click="teclaClick(1)">1</button>
    <button class="tecla" @click="teclaClick(2)">2</button>
    <button class="tecla" @click="teclaClick(3)">3</button>
    <button class="tecla" @click="teclaClick(4)">4</button>
    <button class="tecla" @click="teclaClick(5)">5</button>
    <button class="tecla" @click="teclaClick(6)">6</button>
    <button class="tecla" @click="teclaClick(7)">7</button>
    <button class="tecla" @click="teclaClick(8)">8</button>
    <button class="tecla" @click="teclaClick(9)">9</button>
    <button class="tecla" id="numero" @click="teclaClick(0)">0</button>
  </div>
</div>

<div class="botontemp">
  <input type="button" @click="temperaturaClick()">
</div>

<div class="btnventana">
  <input type="button" @click="ventanaClick()">
</div>

<div class="btnreloj">
  <input type="button" @click="relojClick()">
</div>

<div class="btnEstanteria">
  <input type="button" @click="estanteriaClick()">
</div>

<div class="centrarfrases">
  <span class="frases" ref="frasesElement"> {{ fraseActual }}</span>
</div>


</template>

<script>
import Swal from "sweetalert2";
import route from '../../vendor/tightenco/ziggy';
export default {
    data() {
        return {
            mostrarResumen: true,  // Mostrar el resumen al principio

            valorCeros: '00000',
            i: 0,
            fraseActual: '',
            arrayfrases: {
                frase1: "Bakarrik 4°C-ko temperatura egiten du",
                frase2: "Hotz handia egiten du gela honetan...",
                frase3: "18:00-ak markatzen du orduak...",
                frase4: "Liburu hauek 20 urte dituzte gutxienez"
            },
            frasePista: 'Zenbakien orden zuzena aurkitu gelatik ateratzeko'

        }
    },
    methods: {
        teclaClick(valor) {
            // Eliminar los ceros a la izquierda
            this.valorCeros = this.valorCeros.replace(/^0+/, '');

            // Verificar si el total de cifras es menor a 5 antes de actualizar
            if ((this.valorCeros + valor).length <= 5) {
                // Concatenar el nuevo dígito desde la izquierda y rellenar con ceros
                this.valorCeros = (this.valorCeros + valor.toString()).padStart(5, '0');
            }

            console.log(this.valorCeros);

            this.i++;

            if (this.i >= 5) {
                if (this.valorCeros === "24810") {
                    Swal.fire({
                        title: "ONDO JOKATUA",
                        text: "Lehen gelatik atera zara",
                        icon: "success",
                        confirmButtonText: "Itzuli",
                        heightAuto: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a la página deseada
                            window.location.href = route('actualizar.puntuacion');
                        }
                    });
                } else {
                    // alert("no");
                    let numerosSpan = this.$refs.valorCerosElement;
                    let mhz = this.$refs.emehachezeta;

                    // Aplicar temporalmente el estilo para el parpadeo en rojo
                    numerosSpan.style.webkitTextStrokeColor = 'rgb(255, 0, 0)';
                    numerosSpan.style.animation = 'parpadeo .5s infinite';
                    mhz.style.webkitTextStrokeColor = 'rgb(255, 0, 0)';
                    mhz.style.animation = 'parpadeo .5s infinite';


                    // Esperar 2 segundos y luego volver al estilo original
                    setTimeout(() => {
                        numerosSpan.style.webkitTextStrokeColor = 'rgb(52, 208, 255)';
                        numerosSpan.style.animation = 'none';
                        mhz.style.webkitTextStrokeColor = 'rgb(52, 208, 255)';
                        mhz.style.animation = 'none';
                    }, 1000);
                    this.valorCeros = '00000';
                }
                // Reiniciar el contador i
                this.i = 0;
                this.$refs.valorCerosElement.classList.remove("parpadeo");

            }
        },
        restartAnimation() {
            // Agregar temporalmente una clase para reiniciar la animación
            let frasesElement = this.$refs.frasesElement;
            frasesElement.classList.remove("animacionfrases");
            void frasesElement.offsetWidth;
            // Truco para forzar un reflow y reiniciar la animación
            frasesElement.classList.add("animacionfrases");
        },

        temperaturaClick() {
            this.fraseActual = this.arrayfrases.frase1;
            this.restartAnimation();
            console.log(this.fraseActual);
        },

        ventanaClick() {
            this.fraseActual = this.arrayfrases.frase2;
            this.restartAnimation();
            console.log(this.fraseActual);
        },

        relojClick() {
            this.fraseActual = this.arrayfrases.frase3;
            this.restartAnimation();
            console.log(this.fraseActual);
        },

        estanteriaClick() {
            this.fraseActual = this.arrayfrases.frase4;
            this.restartAnimation();
            console.log(this.fraseActual);
        },

        pista() {
            const Bombilla = document.getElementById('ConfirmaPista');
            Bombilla.className = 'confirmation-box-si';

            const ElementoBody = document.body;
            ElementoBody.style.backdropFilter = 'blur(10px)';

            const Panel = document.getElementById('leds');
            Panel.classList.add('blur-effect');  // Agregar clase de desenfoque al panel-led

            const Teclado = document.getElementById('Teclado');
            Teclado.classList.add('blur-effect');
        },

        BotonNo() {
            const Bombilla = document.getElementById('ConfirmaPista');
            Bombilla.className = 'confirmation-box';

            const ElementoBody = document.body;
            ElementoBody.style.backdropFilter = 'none';

            const Panel = document.getElementById('leds');
            Panel.classList.remove('blur-effect');  // Agregar clase de desenfoque al panel-led

            const Teclado = document.getElementById('Teclado');
            Teclado.classList.remove('blur-effect');
        },

        BotonSi() {
            const DivDeLaPista = document.getElementById('DivPista');
            DivDeLaPista.className = 'EldivDelapistaVisible';

            const Bombilla = document.getElementById('ConfirmaPista');
            Bombilla.className = 'confirmation-box';

        },

        iniciarJuego() {
      // Ocultar el resumen y mostrar el contenido del juego
      this.mostrarResumen = false;
    },

        cerrarPista() {
            const DivDeLaPista = document.getElementById('DivPista');
            DivDeLaPista.className = 'EldivDelapistaNone';

            const ElementoBody = document.body;
            ElementoBody.style.backdropFilter = 'none';

            const Panel = document.getElementById('leds');
            Panel.classList.remove('blur-effect');  // Agregar clase de desenfoque al panel-led

            const Teclado = document.getElementById('Teclado');
            Teclado.classList.remove('blur-effect');
        }
    }
}
</script>


<style>
.pagina-negra {
    background-color: black;
    color: white;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    z-index: 1000;
  }
  
  .pagina-negra h1 {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .pagina-negra p {
    font-size: 18px;
    margin-bottom: 20px;
  }
  
  .pagina-negra button {
    padding: 10px 20px;
    font-size: 18px;
    background-color: white;
    color: black;
    border: none;
    cursor: pointer;
  }

.custom-style {
    font-family: 'Zen Dots', sans-serif;

}
</style>