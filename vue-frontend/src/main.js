import { createApp } from 'vue';
import App from '@/App.vue';
import router from "@/router";

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import '@/assets/css/nav-footer.css'; 



// import { createRouter, createWebHistory } from 'vue-router';
// import routes from '@/router';
// import BootstrapVue from "bootstrap-vue";
// import Vue from "router";
//
// Vue.use(BootstrapVue)

const app = createApp(App);



app.use(router);

app.mount('#app');
