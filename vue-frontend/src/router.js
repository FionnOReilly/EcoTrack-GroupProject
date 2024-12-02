import { createRouter, createWebHistory } from 'vue-router';

import HomePage from './components/HomePage.vue';
import NavBar from "@/components/NavBar.vue"
import Footer from "@/components/FooterComponent.vue"
import RegistrationPage from './components/RegistrationPage.vue';
import InformationPage from './components/InformationPage.vue';
import WasteLog from './components/WasteLog.vue';
import LoginPage from './components/LoginPage.vue';
import AdminLogin from './components/AdminLogin.vue';
import DashboardPage from './components/DashboardPage.vue';
import AdminDashboard from "@/components/AdminDashboard.vue";
import LeaderBoard from "@/components/LeaderBoard.vue";
import UserGoals from "@/components/UserGoals.vue";
import ViewAdmin from "@/components/ViewAdmin.vue";
import ManageUsers from "@/components/ManageUsers.vue";
import ManageAdmin from "@/components/ManageAdmin.vue";
import AddAdmin from "@/components/AddAdmin.vue";

const routes = [
    { path: '/', component: HomePage },
    { path: '/NavBar', component: NavBar },
    { path: '/Footer', component: Footer },
    { path: '/Information', component: InformationPage },
    { path: '/Registration', component: RegistrationPage },
    { path: '/WasteLogging', component: WasteLog },
    { path: '/Login', component: LoginPage },
    { path: '/Leaderboard', component: LeaderBoard },
    { path: '/Goals', component: UserGoals },

    { path: '/AdminLogin', component: AdminLogin },
    { path: '/dashboardPage', name: 'DashboardPage', component: DashboardPage, meta: { requiresAuth: true }, },
    { path: '/AdminDashboard', name: 'AdminDashboard', component: AdminDashboard, meta: { requiresAuth: true }, },
    { path: '/ViewAdmin', name: 'ViewAdmin', component: ViewAdmin, meta: { requiresAuth: true }, },
    { path: '/ManageUsers', name: 'ManageUsers', component: ManageUsers, meta: { requiresAuth: true }, },
    { path: '/ManageAdmin', name: 'ManageAdmin', component: ManageAdmin, meta: { requiresAuth: true }, },
    { path: '/AddAdmin', name: 'AddAdmin', component: AddAdmin, meta: { requiresAuth: true }, }
   
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;

