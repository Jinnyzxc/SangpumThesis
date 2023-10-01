import './bootstrap';
import {createApp} from 'vue';
import App from './../../App.vue';
import router from  './../router/routes-library.js'
import {vuex} from './store/store'

createApp(App).use(vuex)
createApp (App).use(router).mount("#app");

import('tailwindcss').Config

require('node_modules/flowbite/dist/flowbite.min.js.map')
