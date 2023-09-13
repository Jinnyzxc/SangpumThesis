import { createRouter, createWebHistory }  from 'vue-router';
import LoginComponent from '../components/login.vue';
import Home from '../components/home.vue';
import NotFound from '../components/notFound.vue';
import SignupComponent from '../components/signup.vue'


const routes = [
    {
        path: '/login',
        component: LoginComponent
    },
    {
        path: '/signup',
        component: SignupComponent
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }

]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
