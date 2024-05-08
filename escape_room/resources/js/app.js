import { createApp } from 'vue';
import {createPinia} from 'pinia';
import { ZiggyVue } from 'ziggy-js';
import Juego3 from '../components/juegos3.vue';
import Juego4 from '../components/juegos4.vue';
import Juego1 from '../components/juegos1.vue';
import Juego5 from '../components/juegos5.vue';


import "../css/main.css";
import "../css/game.css";

const app = createApp(
    {
        components:{
            Juego3,
            Juego4,
            Juego1,
            Juego5
        }
    }
);
app.use(createPinia());
app.use(ZiggyVue);
app.mount('#app2');


