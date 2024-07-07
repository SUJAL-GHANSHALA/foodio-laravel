import { createRouter, createWebHistory } from 'vue-router';

import Homepage from '../views/Homepage/Homepage.vue'
import Login from '../views/Login/Login.vue'
import Register from '../views/Register/Register.vue'
import Dashboard from '../views/Seller/Dashboard.vue'

const routes = [
    {
        path: '/',
        name: 'Homepage',
        component:  Homepage
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path:'/seller/Dashboard',
        name:'Dashboard',
        component:Dashboard
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes
});

export default router;