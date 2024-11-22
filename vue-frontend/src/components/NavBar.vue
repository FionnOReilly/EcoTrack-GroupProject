<template>
  <header class="custom-header py-3">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <router-link to="/"><img src="@/assets/images/EcoTrackLogo.png" alt="Logo"></router-link>
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
              <router-link to="/" class="nav-link active">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/WasteLogging" class="nav-link">Log Waste</router-link>
            </li>
            <li class="nav-item">
              <router-link to="Information" class="nav-link">Information</router-link>
            </li>
            <li class="nav-item">
              <router-link to="" class="nav-link">Goals</router-link>
            </li>
            <li class="nav-item">
              <router-link to="Registration" class="nav-link">Register/Login</router-link>
            </li>
			<li class="nav-item">
              <router-link to="Login" class="nav-link">Login</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>

<script setup>
</script>