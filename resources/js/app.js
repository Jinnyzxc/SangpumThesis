import './bootstrap';
import {createApp} from 'vue';
import App from './../../App.vue';
import router from  './../router/routes-library.js'
import {vuex} from './store/store'
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
createApp(App).component('font-awesome-icon', FontAwesomeIcon)

createApp(App).use(vuex)
createApp(App).use(router).mount("#app");

import('tailwindcss').Config

