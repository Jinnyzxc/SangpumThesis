import { createRouter, createWebHistory }  from 'vue-router';
import LoginComponent from '../components/login.vue';
import Home from '../components/home.vue';
import NotFound from '../components/notFound.vue';
import SignupComponent from '../components/signup.vue';
import ForgotComponent from '../components/forgot.vue';
import ResetComponent from '../components/reset.vue';
import SellerPersonalInfo from './../components/seller/signup-seller.vue'
import BuyerPersonalInfo from './../../resources/components/buyer/signup-buyer.vue'
import DashboardSeller from './../components/seller/dashboardSeller.vue'
import AdminDashboard from './../components/admin/dashboard.vue'
import Shopping from './../components/buyer/shopping.vue'

const routes = [
    {
        path: '/signup',
        component: SignupComponent
    },
    {
        path: '/admin/dashboard',
        component: AdminDashboard
    },
    {
        path: '/shopping-page',
        component: Shopping
    },
    {
        path: '/personal-info/seller',
        component: SellerPersonalInfo
    },
    {
        path: '/seller/dashboard',
        component: DashboardSeller
    },
    {
        path: '/personal-info/buyer',
        component: BuyerPersonalInfo
    },
    {
        path: '/login',
        component: LoginComponent
    },
    {
        path: '/forgot',
        component: ForgotComponent
    },
    {
        path: '/reset',
        component: ResetComponent,
        name: 'reset'
    },
    {
        path: '/',
        component: Home
    },
    {
        path: '/home',
        component: Home,
        name: 'home'
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
