import { defineStore } from 'pinia'


//Definimos el almacén "counter" mediante defineStore
//Este almacén contendrá el estado, las getters y las acciones
export const useCounterStore = defineStore('counter', {
  state: () => ({ 
    contador: 5,
  }),
  //En Pinia un getter es una función que se utiliza para obtener y calcular valores derivados del estado almacenado en un store.
  //Son similares a las propiedades computadas en Vue, pero están asociados a un store específico y se definen dentro de la sección getters al crear el store con defineStore.
  getters: {
    // parImpar(){
    //   if (this.contador % 2===0) 
    //     return "PAR"
    //   return "IMPAR"
    // }
  },
  //Las acciones modifican la propiedad contador del estado del almacén
  actions: {
    restarContador(){
      this.contador--
    }
    //   this.contador++
    // },
    // decrementar(){
    //   this.contador--
    // }
    
  },
})