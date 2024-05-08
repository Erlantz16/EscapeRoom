<template>
    
        <!-- Jokoa hasi gabea dagoenean erakusten den atala -->

    <div v-if="!juegoIniciado" class="pagina-negra">
                <!-- Ongi etorri mezuaren eta jokoaren azalpenaren txokoa -->

    <h1 class="custom-style">Ongi etorri 3. jokura!</h1>
    <p class="custom-style">Oso ondo egiten ari zara!</p>
        <p class="custom-style">Orain irrati bat behar degu baina zenbait pieza behar ditugu montatu ahal izateko, 5 pieza aurkitu behar dituzu.</p>
        <p class="custom-style">Aurkitu dezakezu?</p>
                <!-- Joko hasi botoia -->

    <button @click="iniciarJuego" class="custom-button">Jolastu</button>
</div>

    <!-- Jokoa hasi ondoren erakusten den atala -->

    <div v-else>
                <!-- Objetu aurkituaren arabera eguneratzen den mezu dinamikoa -->

    <p id="mensaje" class="mensaje">{{ mensaje }}</p>
        <!-- Jokoaren objetuen irudiak k´clik-ekin erlazionatuta -->

    <img @click="ocultarImagen(1)" id="caja" class="caja" src="images/caja.png">
    <img @click="ocultarImagen(2)" id="antena" class="antena" src="images/antena.png">
    <img @click="ocultarImagen(3)" id="cable" class="cable" src="images/cable.png">
    <img @click="ocultarImagen(4)" id="amplificador" class="amplificador" src="images/amplificadorRF.png">
    <img @click="ocultarImagen(5)" id="perilla" class="perilla" src="images/perilla.png">
</div>
</template>

<script>
// SweetAlert2 importatu
import Swal from 'sweetalert2';
// Store-ko egoerak eta akzioak mapeatzen dira
import { mapState, mapActions } from 'pinia'
// Store-a importatu
import {useCounterStore} from '../stores/counter'
export default {
        // Store-ko egoerak eta akzioak mapeatzen dira

    computed: {
        ...mapState(useCounterStore, ['contador'])
    },
   // Komponentearen lokal datuak
   data() {
        return {
            juegoIniciado: false,
            mostrarMensaje: false,
            mensaje: "",
            timeoutId: null, // Timeout identifikatzailea gorde
        };
    },
    // Komponentearen metodoei buruz
    methods: {
        ...mapActions(useCounterStore, ['restarContador']),
        // Jokoari hasiera emateko metodoa
        iniciarJuego() {
            this.juegoIniciado = true;
            // Hemen jokoari hasiera emateko logika gehitzeko aukera daukazu
        },
     ocultarImagen(numero) {
            this.restarContador(); // Kontadorea kendu
            if (this.timeoutId) { // Timeout existitzen bada
                clearTimeout(this.timeoutId); // Existitzen den timeout-a garbitu
            }
            switch (numero) {
                                // Aurkitutako objektuaren arabera mezuaren eguneraketa eta irudia ezkutatzea

                case 1:
                    // Irudia ezkutatu eta mezuak erakutsi
                    document.getElementById("caja").style.display = "none";
                    this.mostrarMensaje = true;
                    this.mensaje = "Kutxa aurkitu duzu! " + this.contador + " objetu geratzen zizkizu";
                    this.timeoutId = setTimeout(() => {
                        this.mensaje = "";
                    }, +5000);
                    break;
                    case 2:
                    // Irudia ezkutatu eta mezuak erakutsi
                    document.getElementById("antena").style.visibility = "hidden";
                    this.mostrarMensaje = true;
                    this.mensaje = "Antena aurkitu duzu! " + this.contador + " objetu geratzen zizkizu";
                    this.timeoutId = setTimeout(() => {
                        this.mensaje = "";
                    }, +5000);
                    break;
                case 3:
                    // Irudia ezkutatu eta mezuak erakutsi
                    document.getElementById("cable").style.visibility = "hidden";
                    this.mostrarMensaje = true;
                    this.mensaje = "Kablea aurkitu duzu! " + this.contador + " objetu geratzen zizkizu";
                    this.timeoutId = setTimeout(() => {
                        this.mensaje = "";
                    }, +5000);
                    break;
                case 4:
                    // Irudia ezkutatu eta mezuak erakutsi
                    document.getElementById("amplificador").style.visibility = "hidden";
                    this.mostrarMensaje = true;
                    this.mensaje = "Amplifikadorea aurkitu duzu! " + this.contador + " objetu geratzen zizkizu";
                    this.timeoutId = setTimeout(() => {
                        this.mensaje = "";
                    }, +5000);
                    break;
                case 5:
                document.getElementById("perilla").style.visibility = "hidden";
                    this.mostrarMensaje = true;
                    this.mensaje = "Perilla aurkitu duzu! " + this.contador + " objetu geratzen zizkizu";
                    this.timeoutId = setTimeout(() => {
                        this.mensaje = "";
                    }, +5000);
                  // Objektu geratzen diren beste kasuak...
            }
            // Objektu guztiak aurkitu diren egiaztatu
        if (this.contador === 0) {
                // Zorionak mezu bat erakutsi SweetAlert2 bidez
                Swal.fire({
                    title: 'Zorionak!',
                    text: 'Objetu guztiak aurkitu dituzu!',
                    icon: 'success',
                    confirmButtonText: 'Itzuli',
                    heightAuto: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Puntuazioa eguneratzeko orria birbideratu
                        window.location.href = route('actualizar.puntuacion');
                    }
                });
            }
    },
  },
   
};
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
    /* Otros estilos personalizados aquí */

}



.caja,
.antena,
.cable,
.amplificador,
.perilla {
    position: absolute;
    
}

.caja {
    top: 480px;
    left: 740px;
    height: 100px;
    width: 120px;
}

.amplificador {
    bottom: 153px;
    right: 0px;
    height: 60px;
}

.antena {
    top: 725px;
    right: 80px;
    height: 100px;
    width: 100px;
}

.perilla {
    top: 430px;
    left: 550px;
    width: 35px;
    height: 35px;
}

.cable {
    top: 740px;
    left: 327px;
    height: 100px;
}

.mensaje {
    color: red;
    -webkit-text-stroke: 1px black;
    font-weight: bold;
    font-size: 20px;
}


.custom-style {
    font-family: 'Zen Dots', sans-serif;
    /* Otros estilos personalizados aquí */
}

.custom-button {
    padding: 10px 20px;
    font-size: 18px;
    background-color: black;
    color: white;
    border: none;
    cursor: pointer;
    /* Otros estilos personalizados aquí */
}

</style>