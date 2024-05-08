import Swal from "sweetalert2";
import route from '../../vendor/tightenco/ziggy';

const containerReloj = document.getElementById('containerReloj');
const containerGlobo = document.getElementById('containerGlobo');
const containerRadio = document.getElementById('containerRadio');
const containerAntena = document.getElementById('containerAntena');
const mensajeRadio = document.getElementById('mensajeRadio');
const antena = document.getElementById('antena');
const cajaAntena = document.getElementById('cajaAntena');

const body = document.body;

document.addEventListener("DOMContentLoaded", function() {
    const progressBar = document.getElementById("barraVolumen");
    const incrementButton = document.getElementById("volumenSube");
    const decrementButton = document.getElementById("volumenBaja");

    const envioButton = document.getElementById("envio");
    envioButton.addEventListener("click", accionFinal);

    incrementButton.addEventListener("click", function() {
        if (progressBar.value < progressBar.max - 10) {
            progressBar.value += 10;
            app.suma += 10;
        } else if (progressBar.value == progressBar.max - 10) {
            progressBar.value += 10;
            app.suma += 10;
            app.muestraMensaje = true;
        }
    });

    decrementButton.addEventListener("click", function() {
        progressBar.value -= 10;
        app.suma -= 10;
        app.muestraMensaje = false;
    });
});

const vueApp = Vue.createApp({
    data() {
        return {
            animacionActiva: false,
            muestraVolver: true,
            muestraVolverBtn: false,
            muestraInicio: true,
            muestraMensajeReloj: false,
            muestraMensajeMapa: false,
            muestraMensajeCoordenadas: false,
            muestraMensajeAntena: false,
            muestraMensajeRadio: false,
            muestraBarraVolumen: false,
            muestraCajaAntena: false,
            muestraCajaAntenaFinal: false,
            muestraCajaError: false,
            animacionEntra: false,
            animacionSale: false,
            suma: 10,
        };
    },

    methods: {
        accionReloj() {
            this.muestraVolverBtn = true;
            this.muestraVolver = true;
            this.muestraMensajeReloj = true;
            body.classList.add('body-blur');
        },

        accionAntena() {
            this.muestraVolverBtn = true;
            this.muestraVolver = true;
            this.muestraMensajeAntena = true;
            this.muestraCajaAntena = true;
            if (this.animacionActiva) {
                this.animacionActiva = false;
            }
            body.classList.add('body-blur');
        },

        accionGlobo() {
            this.muestraVolverBtn = true;
            this.muestraVolver = true;
            this.muestraMensajeMapa = true;
            body.classList.add('body-blur');
        },

        muestraCoordenadas() {
            this.muestraMensajeCoordenadas = true;
        },

        ocultaCoordenadas() {
            this.muestraMensajeCoordenadas = false;
        },

        accionRadio() {
            this.muestraVolverBtn = true;
            this.muestraVolver = true;
            this.muestraMensajeRadio = true;
            body.classList.add('body-blur');

            if (this.suma == 100) {
                this.muestraMensaje = true;
            }
        },

        muestraVolumen() {
            this.muestraBarraVolumen = true;
        },

        ocultaVolumen() {
            this.muestraBarraVolumen = false;
        },

        muestraVolumen() {
            this.muestraBarraVolumen = true;
        },

        ocultaVolumen() {
            this.muestraBarraVolumen = false;
        },

        accionVolver() {
            this.muestraVolverBtn = false;
            this.muestraVolver = false;
            this.muestraMensajeReloj = false;
            this.muestraMensajeMapa = false;
            this.muestraMensajeRadio = false;
            this.muestraMensaje = false;
            this.muestraMensajeAntena = false;
            this.muestraCajaAntena = false;
            this.muestraCajaAntenaFinal = false;
            this.muestraInicio = false,
            body.classList.remove('body-blur');
        },

        muestraCaja() {
            this.animacionActiva = !this.animacionActiva;
            this.muestraCajaAntena = false;
            this.muestraCajaAntenaFinal = true;
        },

        muestraError() {
            this.animacionEntra = true;
            this.muestraCajaError = true;
        },

        ocultaError() {
            this.animacionSale = true;
            this.muestraCajaError = false;
        }
    },
});

const app = vueApp.mount("#app");

function animacionJuegoPasado() {
    Swal.fire({
        title: 'Zorionak!',
        text: 'Bigarren froga pasatu duzu!',
        icon: 'success',
        confirmButtonText: 'Bueltatu',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = route('actualizar.puntuacion');
        }
    });
}

function animacionError() {
    app.muestraError();
    setTimeout(app.ocultaError, 3000);
}

function accionFinal() {
    var primeraCoordenada = document.getElementById('primeraCoordenada').value;
    var segundaCoordenada = document.getElementById('segundaCoordenada').value;
    var inclinacion = document.getElementById('inclinacion').value;
    var primerAzimut = document.getElementById('primerAzimut').value;
    var segundoAzimut = document.getElementById('segundoAzimut').value;

    var todoCorrecto = true;
    var datosIngresados = true;

    if (primeraCoordenada != "" && segundaCoordenada != "" && inclinacion != "" && primerAzimut != "" && segundoAzimut != "") {
        if (primeraCoordenada != "-64.247" || segundaCoordenada != "-56.623" || inclinacion != "45.15" || primerAzimut != "10" || segundoAzimut != "10") {
            todoCorrecto = false;
        }
    } else {
        datosIngresados = false;
    }

    if (datosIngresados) {
        if (todoCorrecto) {
            animacionJuegoPasado();
        } else {
            animacionError();
        }
    } else {
        animacionError();
    }
}
