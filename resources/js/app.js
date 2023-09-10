import './bootstrap';

import {createApp} from 'vue';

import App from './../../App.vue';
import router from  './../router/routes-library.js'

createApp (App).use(router).mount("#app");


import('tailwindcss').Config
