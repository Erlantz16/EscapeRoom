<script setup>
import { onUnmounted, ref, computed, reactive } from 'vue'

import { LetterState, resultWords } from '../utils/types'
import Swal from 'sweetalert2'
import { showMessage, message } from '../stores/store'
import route from '../../vendor/tightenco/ziggy/src/js';

let showWordle = ref(false);
let mostrarResumen = ref(true);

showWordle.value = false;

// Get word of the day
const answer = "vatio"

// console.log('Answer:', answer)

// Board state. Each tile is represented as { letter, state }
const board = ref(
  Array.from({ length: 6 }, () =>
    Array.from({ length: 5 }, () => ({
      letter: '',
      state: LetterState.INITIAL
    }))
  )
)



// Current active row.
let currentRowIndex = ref(0)
const currentRow = computed(() => board.value[currentRowIndex.value])

// console.log("current:", currentRow.value);

// Feedback state: message and shake
// let message = ref('')
let grid = ref('')
let shakeRowIndex = ref(-1)
let success = ref(false)
let isActiveModal = ref(false)
let modalInfo = ref('')

// Keep track of revealed letters for the virtual keyboard
const letterStates = reactive({})

// Handle keyboard input.
let allowInput = ref(true)

const onKeyup = e => {
  // console.log(e.key);
  onKey(e.key)
}

window.addEventListener('keyup', onKeyup)

onUnmounted(() => {
  window.removeEventListener('keyup', onKeyup)
})


function mostrarWordle() {
  showWordle.value = true;
}

function onKey(key) {
  if (!allowInput.value) return
  if (/^[a-zA-Z\u00f1\u00d1]$/.test(key)) {
    fillTile(key.toLowerCase())
  } else if (key === 'Backspace') {
    clearTile()
  } else if (key === 'Enter') {
    completeRow()
  }
}

function fillTile(letter) {
  // console.log(currentRow);

  for (const tile of currentRow.value) {
    if (!tile.letter) {
      tile.letter = letter
      break
    }
  }
}

function clearTile() {
  for (const tile of [...currentRow.value].reverse()) {
    if (tile.letter) {
      tile.letter = ''
      break
    }
  }
}

function completeRow() {
  if (currentRow.value.every(tile => tile.letter)) {
    const guess = currentRow.value.map(tile => tile.letter).join('')
    // if (!allWords.includes(guess) && guess !== answer) {
    //   shake()
    //   showMessage(`La palabra no está en la lista`)
    //   return
    // }

    const answerLetters = answer.split('')
    // Primer paso: marcar las letras correctas
    currentRow.value.forEach((tile, i) => {
      if (answerLetters[i] === tile.letter) {
        tile.state = letterStates[tile.letter] = LetterState.CORRECT
        answerLetters[i] = null
      }
    })
    // Segundo paso: marcar las letras presentes
    currentRow.value.forEach(tile => {
      if (!tile.state && answerLetters.includes(tile.letter)) {
        tile.state = LetterState.PRESENT
        answerLetters[answerLetters.indexOf(tile.letter)] = null
        if (!letterStates[tile.letter]) {
          letterStates[tile.letter] = LetterState.PRESENT
        }
      }
    })
    // Tercer paso: marcar las letras ausentes
    currentRow.value.forEach(tile => {
      if (!tile.state) {
        tile.state = LetterState.ABSENT
        if (!letterStates[tile.letter]) {
          letterStates[tile.letter] = LetterState.ABSENT
        }
      }
    })

    allowInput.value = false
    if (currentRow.value.every(tile => tile.state === LetterState.CORRECT)) {
      // Ganaste!!
      setTimeout(() => {
        grid.value = genResultGrid()
     //   showMessage(resultWords[currentRowIndex.value], -1)
        success.value = true
        mostrarMensajeEnhorabuena(); // Agrega esta línea para mostrar el mensaje de felicitación
      }, 1600)
    } else if (currentRowIndex.value < board.value.length - 1) {
      // Ir a la siguiente fila
      currentRowIndex.value++
      setTimeout(() => {
        allowInput.value = true
      }, 1600)
    } else {
      // Juego perdido :(
        if (currentRowIndex.value === board.value.length - 1) {
  // Última fila y juego perdido
  setTimeout(() => {
    Swal.fire({
      title: 'GAME OVER',
      text: `Zaiatu berriro!`,
      icon: 'error',
      confirmButtonText: 'Jolastu berriro',
      showCancelButton: true,
      cancelButtonText: 'Itzuli',
    }).then((result) => {
      if (result.isConfirmed) {
        // Lógica para reiniciar el juego
        reiniciarJuego();
      } else {
        // Lógica para volver al menú
        volverAlMenu();
      }
    });
  }, 1600);
} else {
  // Juego perdido pero no en la última fila
  setTimeout(() => {
    showMessage(answer.toUpperCase(), -1);
  }, 1600);
}

    }
  } else {
    shake()
    showMessage('Ezin dira letrak falta')
  }
}

function reiniciarJuego() {
  // Lógica para reiniciar el juego (restablecer el tablero, etc.)
  board.value = Array.from({ length: 6 }, () =>
    Array.from({ length: 5 }, () => ({
      letter: '',
      state: LetterState.INITIAL
    }))
  );

  // Recargar la página
  window.location.reload();
}


function volverAlMenu() {
  window.location.href="portada"
  // Lógica para volver al menú (puedes cambiar la ubicación o hacer lo que sea necesario)
}


// Dentro de la función mostrarMensajeEnhorabuena() en tu componente Game.vue
function mostrarMensajeEnhorabuena() {
  const cuadraditos = genResultGrid();  // Asume que genResultGrid() genera los cuadraditos necesarios

  Swal.fire({
    title: 'Zorionak, hitz sekretua asmatu duzu!',
    html: `
      <p style="white-space: pre-wrap;">${cuadraditos}</p>
    `,
    confirmButtonText: 'Itzuli!',
    customClass: {
      popup: 'fixed top-0 -ml-96 mt-64 mr-96 left-1/2 border-2 border-gray-400 bg-gray-100 rounded-md h-64 w-fit text-lg px-4 py-2',
      confirmButton: 'border-2 border-black rounded-md bg-red-500 py-1 px-2 text-white font-bold w-24 h-fit mt-12 ml-80',
    },
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = route('actualizar.puntuacion')  // Puedes llamar a la función que deseas ejecutar al volver
        };  // Puedes llamar a la función que deseas ejecutar al volver
  });
}

// function showMessage (msg, time = 1000) {
//   message.value = msg
//   if (time > 0) {
//     setTimeout(() => {
//       message.value = ''
//     }, time)
//   }
// }

function shake() {
  shakeRowIndex.value = currentRowIndex.value
  setTimeout(() => {
    shakeRowIndex.value = -1
  }, 1000)
}

const icons = {
  [LetterState.CORRECT]: '🟩',
  [LetterState.PRESENT]: '🟨',
  [LetterState.ABSENT]: '⬜',
  [LetterState.INITIAL]: null
}

function iniciarJuego() {
  mostrarResumen.value = false;
  // También puedes agregar cualquier otra lógica de inicio del juego aquí
}


function genResultGrid() {
  return board.value
    .slice(0, currentRowIndex.value + 1)
    .map(row => {
      return row.map(tile => icons[tile.state]).join('')
    })
    .join('\n')
}

function mostrarPista() {
  // Aquí deberías agregar la lógica para mostrar una pista
  Swal.fire({
    title: 'Pista',
    text: 'Bilatzen duzun hitzak potentziaren neurri-unitatearekin du zerikusia',
    icon: 'info',
    confirmButtonText: 'Ulertuta'
  });
}

</script>



<template>

<div v-if="mostrarResumen" class="pantalla-resumen">
      <h1 class="estilo-texto">¡Ongi etorri azken jokura Asmatu Hitza!</h1>
      <p class="estilo-texto">Saiatu lerro bakoitzean ezkutatutako hitza asmatzen. Jarri letrak eta jakin zein diren zuzenak!.</p>
      <button class="estilo-texto" @click="iniciarJuego">Jolastu</button>
    </div>

  <Transition>
    <div class="message" v-if="message">
      {{ message }}
      <pre v-if="grid">{{ grid }}</pre>
    </div>
  </Transition>
    <div class="background-image">
      <img
      class="hint-button"
      src="../../public/images/bombilla.png"
      alt="Hint Button"
      @click="mostrarPista"/>
    </div>
    <h1 class="titulo4">ASMATU HITZA</h1>

    <div id="board">
      <div v-for="(row, index) in board" :class="[
                  'row',
                  shakeRowIndex === index && 'shake',
                  success && currentRowIndex === index && 'jump'
                ]">
        <div v-for="(tile, index) in row" :class="['tile', tile.letter && 'filled', tile.state && 'revealed']">
          <div class="front" :style="{ transitionDelay: `${index * 300}ms` }">
            {{ tile.letter }}
          </div>
          <div :class="['back', tile.state]" :style="{
                      transitionDelay: `${index * 300}ms`,
                      animationDelay: `${index * 100}ms`
        }">
          {{ tile.letter }}
        </div>
      </div>
    </div>
  </div>
  <div class="overlay" id="overlay" :class="{ active: isActiveModal }"></div>
 
</template>

<style scoped>
#board {
  display: grid;
  grid-template-rows: repeat(6, 1fr);
  grid-gap: 5px;
  padding: 10px;
  box-sizing: border-box;
  --height: min(420px, calc(var(--vh, 100vh) - 310px));
  height: var(--height);
  width: min(350px, calc(var(--height) / 6 * 5));
  margin: 0px auto;
  color: #eff3f8;
  overflow: hidden;

}

.show-wordle-button {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
}



.background-image {
  position: absolute;
  top: 10px;
  right: 10px;
  /* Asegúrate de que la posición sea relativa para que el botón esté en la esquina superior derecha */
}

.hint-button {
  width: 80px;

  /* Ajusta la posición según sea necesario */
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  
}

.message {
  position: absolute;
  left: 50%;
  top: 80px;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.85);
  padding: 16px 20px;
  z-index: 2;
  border-radius: 4px;
  transform: translateX(-50%);
  transition: opacity 0.3s ease-out;
  font-weight: 600;
}

.message.v-leave-to {
  opacity: 0;
}

.row {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 5px;
}

.tile {
  width: 100%;
  font-size: 2rem;
  line-height: 2rem;
  font-weight: bold;
  vertical-align: middle;
  text-transform: uppercase;
  user-select: none;
  position: relative;
}

.tile.filled {
  animation: zoom 0.2s;
}

.tile .front,
.tile .back {
  box-sizing: border-box;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: transform 0.6s;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}

.titulo4{
  font-family: 'Zen Dots', sans-serif;
  color: #E63462;
}

.tile .front {
  border: 2px solid #E63462;
}

.tile.filled .front {
  border-color: #999;
}

.tile .back {
  transform: rotateX(180deg);
}

.tile.revealed .front {
  transform: rotateX(180deg);
}

.tile.revealed .back {
  transform: rotateX(0deg);
}

@keyframes zoom {
  0% {
    transform: scale(1.1);
  }

  100% {
    transform: scale(1);
  }
}

.shake {
  animation: shake 0.5s;
}

@keyframes shake {
  0% {
    transform: translate(1px);
  }

  10% {
    transform: translate(-2px);
  }

  20% {
    transform: translate(2px);
  }

  30% {
    transform: translate(-2px);
  }

  40% {
    transform: translate(2px);
  }

  50% {
    transform: translate(-2px);
  }

  60% {
    transform: translate(2px);
  }

  70% {
    transform: translate(-2px);
  }

  80% {
    transform: translate(2px);
  }

  90% {
    transform: translate(-2px);
  }

  100% {
    transform: translate(1px);
  }
}

.jump .tile .back {
  animation: jump 0.5s;
}

@keyframes jump {
  0% {
    transform: translateY(0px);
  }

  20% {
    transform: translateY(5px);
  }

  60% {
    transform: translateY(-25px);
  }

  90% {
    transform: translateY(3px);
  }

  100% {
    transform: translateY(0px);
  }
}

@media (max-height: 680px) {
  .tile {
    font-size: 3vh;
  }
}

.pantalla-resumen {
  background-color: black;
  color: white;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000; 
}
.pantalla-resumen h1 {
  font-size: 24px;
  margin-bottom: 20px;
}
.pantalla-resumen p {
  font-size: 18px;
  margin-bottom: 20px;
}
.pantalla-resumen button {
  padding: 10px 20px;
  font-size: 18px;
  background-color: white;
  color: black;
  border: none;
  cursor: pointer;
}

.estilo-texto{
  font-family: 'Zen Dots', sans-serif;

}

</style>
