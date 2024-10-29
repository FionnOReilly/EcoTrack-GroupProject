<!-- src/App.vue -->
<template>
  <div id="app">
    <NavBar />

    <router-view></router-view>

    <FooterComponent />
  </div>
</template>

<script setup>
import NavBar from "@/components/NavBar.vue"; 
import FooterComponent from "@/components/FooterComponent.vue";
</script>

<style>

</style>
