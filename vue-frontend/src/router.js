import { createRouter, createWebHistory } from 'vue-router';

import HomePage from './components/HomePage.vue';
import NavBar from "@/components/NavBar.vue"
import Footer from "@/components/FooterComponent.vue"
import RegistrationPage from './components/RegistrationPage.vue';
import InformationPage from './components/InformationPage.vue';
import WasteLog from './components/WasteLog.vue';
import LoginPage from './components/LoginPage.vue';
import AdminLogin from './components/AdminLogin.vue';
import AdminHome from "@/components/AdminHome.vue";
import ManageUsers from "@/components/ManageUsers.vue";
import ManageAdmin from "@/components/ManageAdmin.vue";
import InsertAdmin from "@/components/InsertAdmin.vue";

const routes = [
    { path: '/', component: HomePage},
    { path: '/NavBar', component: NavBar},
    { path: '/Footer', component: Footer},
    { path: '/Information', component: InformationPage},
    { path: '/Registration', component: RegistrationPage},
    { path: '/WasteLogging', component: WasteLog},
    { path : '/LoginPage', component : LoginPage},
    { path : '/AdminLogin', component : AdminLogin},
    { path : '/AdminHome', component : AdminHome},
    { path : '/ManageUsers', component : ManageUsers},
    { path : '/ManageAdmin', component : ManageAdmin},
    { path : '/InsertAdmin', component : InsertAdmin},
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;

