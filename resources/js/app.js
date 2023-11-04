import './bootstrap';
import {createApp} from 'vue';
import App from './../../App.vue';
import router from  './../router/routes-library.js'
import {vuex} from './store/store'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon);
app.use(vuex);
app.use(router);
app.mount("#app");

import('tailwindcss').Config

