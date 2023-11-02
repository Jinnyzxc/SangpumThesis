import { createRouter, createWebHistory } from 'vue-router';
import LoginComponent from '../components/login.vue';
import Home from '../components/home.vue';
import NotFound from '../components/notFound.vue';
import SignupComponent from '../components/signup.vue';
import ForgotComponent from '../components/forgot.vue';
import ResetComponent from '../components/reset.vue';
import BuyerPersonalInfo from './../../resources/components/buyer/signup-buyer.vue'
import AdminDashboard from './../components/admin/dashboard.vue'
import ShoppingList from './../components/buyer/shoppingList.vue'
import ShoppingCart from './../components/buyer/shoppingCart.vue'
import AdminVerifyBuyer from './../components/admin/verificationSeller.vue'
import AdminVerifySeller from './../components/admin/verificationBuyer.vue'
//seller components
import SellerPersonalInfo from './../components/seller/signup-seller.vue'
import DashboardSeller from './../components/seller/dashboardSeller.vue'
import product from './../components/seller/products/viewProductList.vue'
import shipping from './../components/seller/shipping/viewShipmentList.vue'
import finance from './../components/seller/finance/viewFinance.vue'
const routes = [
    {
        path: '/admin',
        component: AdminDashboard
    },
    {
        path: '/admin/verify-seller',
        component: AdminVerifySeller
    },
    {
        path: '/admin/verify-buyer',
        component: AdminVerifyBuyer
    },
    {
        path: '/shopping-page',
        component: ShoppingList
    },
    {
        path: '/shopping-cart',
        component: ShoppingCart
    },
    {
        path: '/seller/dashboard',
        component: DashboardSeller
    },
    {
        path: '/seller/product',
        component: product
    },
    {
        path: '/seller/shipment',
        component: shipping
    },
    {
        path: '/seller/finance',
        component: finance
    },
    {
        path: '/signup/seller',
        component: SellerPersonalInfo
    },
    {
        path: '/signup/buyer',
        component: BuyerPersonalInfo
    },
    {
        path: '/signup',
        component: SignupComponent
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
