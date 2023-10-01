import { createRouter, createWebHistory }  from 'vue-router';
import LoginComponent from '../components/login.vue';
import Home from '../components/home.vue';
import NotFound from '../components/notFound.vue';
import SignupComponent from '../components/signup.vue';
import ForgotComponent from '../components/forgot.vue';
import ResetComponent from '../components/reset.vue';
import CategoryComponent from '../components/category.vue';
import SubCategoryComponent from '../components/subcategory.vue';
import BrandComponent from '../components/brand.vue';

const routes = [
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
      path: '/category',
      component: CategoryComponent,
      name: 'category'
    },
    {
      path: '/sub_category',
      component: SubCategoryComponent,
      name: 'sub_category'
    },
    {
      path: '/brand',
      component: BrandComponent,
      name: 'brand'
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
