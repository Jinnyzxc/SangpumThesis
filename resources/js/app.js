import './bootstrap';
import {createApp} from 'vue';
import App from './../../App.vue';
import router from  './../router/routes-library.js'
import {vuex} from './store/store'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCoffee as Coffee } from '@fortawesome/free-solid-svg-icons';
// import { faCoffee as Regular  } from '@fortawesome/free-regular-svg-icons';
library.add(Coffee);

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon);
app.use(vuex);
app.use(router);
app.mount("#app");

import('tailwindcss').Config

