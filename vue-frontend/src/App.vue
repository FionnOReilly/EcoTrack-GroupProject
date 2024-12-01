<template>
  <div id="app">
    <NavBar :isLoggedIn="isLoggedIn" @logout="logout" />

<router-view @user-logged-in="checkLoginStatus"></router-view>

    <FooterComponent />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import NavBar from "@/components/NavBar.vue";
import FooterComponent from "./components/FooterComponent.vue";

const router = useRouter();
const isLoggedIn = ref(false);

const checkLoginStatus = () => {
  const token = localStorage.getItem('token');
  isLoggedIn.value = !!token;
};

const logout = () => {
  localStorage.removeItem('user');
  localStorage.removeItem('token');
  isLoggedIn.value = false;
  router.push('/Login');
};

onMounted(() => {
  checkLoginStatus();
});
</script>

<style>
</style>
