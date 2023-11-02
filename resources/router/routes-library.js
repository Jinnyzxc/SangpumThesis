import { createRouter, createWebHistory } from 'vue-router';
import LoginComponent from '../components/login.vue';
import Home from '../components/home.vue';
import NotFound from '../components/notFound.vue';
import SignupComponent from '../components/signup.vue';
import ForgotComponent from '../components/forgot.vue';
import ResetComponent from '../components/reset.vue';
import SellerPersonalInfo from './../components/seller/signup-seller.vue';
import BuyerPersonalInfo from './../../resources/components/buyer/signup-buyer.vue';
import DashboardSeller from './../components/seller/dashboardSeller.vue';
import AdminDashboard from './../components/admin/dashboard.vue';
import ShoppingList from './../components/buyer/shoppingList.vue';
import ShoppingCart from './../components/buyer/shoppingCart.vue';
import AdminVerifyBuyer from './../components/admin/verificationSeller.vue';
import AdminVerifySeller from './../components/admin/verificationBuyer.vue';
import { isUserLoggedIn, getUserType } from './../js/config/login';

const requireAuth = (to, from, next) => {
    if (isUserLoggedIn()) {
        next(); 
    } else {
        next('/login'); 
    }
};

const requireAdmin = (to, from, next) => {
    if (isUserLoggedIn() && getUserType() === 'admin') {
        next();
    } else {
        console.log('User is not an admin. Redirecting to /login');
        next('/login');
    }
};

const requireSeller = (to, from, next) => {
    if (isUserLoggedIn() && getUserType() === 'seller') {
        next(); 
    } else {
        next('/login');
    }
};

const requireSellerOrBuyer = (to, from, next) => {
    if (isUserLoggedIn() && (getUserType() === 'seller' || getUserType() === 'buyer')) {
        next();
    } else {
        next('/login');
    }      
};

const requireBuyer = (to, from, next) => {
    if (isUserLoggedIn() && getUserType() === 'seller') {
        next();
    } else {
        next('/login'); 
    }
};

const routes = [
    {
        path: '/signup',
        component: SignupComponent
    },
    {
        path: '/admin',
        component: AdminDashboard,
        beforeEnter: requireAdmin 
    },
    {
        path: '/admin/verify-seller',
        component: AdminVerifySeller,
        beforeEnter: requireAdmin 
    },
    {
        path: '/admin/verify-buyer',
        component: AdminVerifyBuyer,
        beforeEnter: requireAdmin 
    },
    {
        path: '/shopping-page',
        component: ShoppingList,
        beforeResolve: requireSellerOrBuyer
    },
    {
        path: '/shopping-cart',
        component: ShoppingCart,
        beforeEnter: requireSellerOrBuyer 
    },
    {
        path: '/signup/seller',
        component: SellerPersonalInfo
    },
    {
        path: '/seller/dashboard',
        component: DashboardSeller,
        beforeEnter: requireSeller 
    },
    {
        path: '/signup/buyer',
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
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
