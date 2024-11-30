import { createRouter, createWebHistory } from 'vue-router';

import HomePage from './components/HomePage.vue';
import NavBar from "@/components/NavBar.vue"
import Footer from "@/components/FooterComponent.vue"
import RegistrationPage from './components/RegistrationPage.vue';
import InformationPage from './components/InformationPage.vue';
import WasteLog from './components/WasteLog.vue';
import LoginPage from './components/LoginPage.vue';
import AdminLogin from './components/AdminLogin.vue';
import Dashboard from './components/Dashboard.vue';

const routes = [
    { path: '/', component: HomePage},
    { path: '/NavBar', component: NavBar},
    { path: '/Footer', component: Footer},
    { path: '/Information', component: InformationPage},
    { path: '/Registration', component: RegistrationPage},
    { path: '/WasteLogging', component: WasteLog},
    { path : '/Login', component : LoginPage},
    { path : '/AdminLogin', component : AdminLogin},
 { path: '/dashboard', name: 'Dashboard', component: Dashboard, meta: { requiresAuth: true },},
    { path: '/dashboard', name: 'Dashboard', component: Dashboard, meta: { requiresAuth: true },}
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;

