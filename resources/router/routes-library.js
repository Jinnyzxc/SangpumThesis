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
import  AdminVerifySeller from './../components/admin/verificationSeller.vue';
import  AdminVerifyBuyer from './../components/admin/verificationBuyer.vue';
import  Userlist from './../components/admin/Userlist.vue';
import product from './../components/seller/products/viewProductList.vue';
import { isUserLoggedIn, getUserType } from './../js/config/login';
import finance from './../components/seller/finance/viewFinance.vue';
import shipping from './../components/seller/shipping/viewShipmentList.vue';
import LoginAdmin from './../components/admin/loginAdmin.vue'
import EditProductForm from './../components/seller/products/editProductForm.vue';


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
        next('/login/admin');
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
        path: '/login/admin',
        component: LoginAdmin,
    },
    {
        path: '/admin',
        component: AdminDashboard,
        beforeResolve: requireAdmin 
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
        component: ShoppingCart
    },    
    {
        path: '/seller/dashboard',
        component: DashboardSeller,
        beforeEnter: requireSeller 
    },
    {
        path: '/seller/finance',
        component: finance,
        beforeEnter: requireSeller 
    },
    {
        path: '/signup/seller',
        component: SellerPersonalInfo
    },
    {
        path: '/seller/product',
        component: product,
        beforeEnter: requireSeller 
    },
    {
        path: '/products/:id/edit',
        component: EditProductForm,
        beforeEnter: requireSeller 
    },
    {
        path: '/seller/shipment',
        component: shipping,
        beforeEnter: requireSeller 
    },
    {
        path: '/signup/seller',
        component: SellerPersonalInfo,
        beforeEnter: requireAdmin 
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
        path: '/userlist',
        component: Userlist,
        name: 'userlist'
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
