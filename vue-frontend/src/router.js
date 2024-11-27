import { createRouter, createWebHistory } from 'vue-router';

import HomePage from './components/HomePage.vue';
import NavBar from "@/components/NavBar.vue"
import Footer from "@/components/FooterComponent.vue"
import RegistrationPage from './components/RegistrationPage.vue';
import InformationPage from './components/InformationPage.vue';
import WasteLog from './components/WasteLog.vue';
import UserGoals from "./components/UserGoals.vue";
import LeaderBoard from "./components/LeaderBoard.vue";

const routes = [
    { path: '/', component: HomePage},
    { path: '/NavBar', component: NavBar},
    { path: '/Footer', component: Footer},
    { path: '/Information', component: InformationPage},
    { path: '/Registration', component: RegistrationPage},
    { path: '/WasteLogging', component: WasteLog},
    { path: '/UserGoals', component: UserGoals},
    { path: '/LeaderBoard', component: LeaderBoard}
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;

