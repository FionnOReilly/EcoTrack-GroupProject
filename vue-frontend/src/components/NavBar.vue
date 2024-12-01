<template>
  <header class="custom-header py-3">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <router-link to="/">
          <img src="@/assets/images/EcoTrackLogo.png" alt="Logo" class="logo" style="float: left"/>
        </router-link>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <router-link
                  to="/"
                  class="nav-link"
                  active-class="active"
                  exact-active-class="active"
              >
                Home
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                  to="/WasteLogging"
                  class="nav-link"
                  active-class="active"

              >
                Log Waste
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                  to="/Information"
                  class="nav-link"
                  active-class="active"
              >
                Information
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                  to="/Goals"
                  class="nav-link"
                  active-class="active"
              >
                Goals
              </router-link>

            </li>
            <li class="nav-item">
              <router-link
                  to="/Leaderboard"
                  class="nav-link"
                  active-class="active"
              >
                Leaderboard
              </router-link>

            </li>
            <li class="nav-item" v-if="!props.isLoggedIn">
              <router-link
                  to="/Registration"
                  class="nav-link"
                  active-class="active"
              >
                Register
              </router-link>
            </li>
            <li class="nav-item" v-if="!props.isLoggedIn">
              <router-link
                  to="/Login"
                  class="nav-link"
                  active-class="active"
              >
                Login
              </router-link>
            </li>
            <li class="nav-item" v-if="props.isLoggedIn">
              <router-link
                  to="#"
                  class="nav-link"
                  @click.prevent="logout"
              >
                Logout
              </router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>

<script setup>
import {defineProps, defineEmits} from 'vue';

const props = defineProps({
  isLoggedIn: Boolean,
});

const emits = defineEmits(['logout']);

const logout = () => {
  emits('logout');
};
</script>


