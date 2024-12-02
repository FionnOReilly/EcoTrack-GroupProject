<template>
  <div class="admin-dashboard">


    <!-- Hero Section -->
    <div class="hero-container">
      <div class="textbox">
        <h1>Welcome Admin</h1>
        <p>This is the Admin Home page. Use the buttons below to manage users and admins.</p>
        <button  class="button">
            <router-link to="/ManageUsers" > Manage Users </router-link>
          </button>
          <button  class="button">
        <router-link to="/ManageAdmin" >Manage Admin </router-link>
      </button>
      </div>
    </div>

    
  </div>
</template>

<script>
export default {
  name: "AdminDashboard",
  methods: {
    navigateTo(page) {
      // Replace with your routing logic, e.g., Vue Router
      if (page === "ManageUsers") {
        this.$router.push('/ManageUsers'); // Replace with `this.$router.push('/manage-users')` if using Vue Router
      } else if (page === "ManageAdmins") {
        this.$router.push('/ManageAdmin'); // Replace with `this.$router.push('/manage-admins')` if using Vue Router
      }
    },
  },
};
</script>

<style scoped>
/* Basic Reset */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #f4f7fc;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* Navbar */
.navbar {
  background-color: #42A5A2;
  padding: 15px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: white;
}

.navbar a {
  color: white;
  text-decoration: none;
  margin: 0 10px;
}

/* Hero Section */
.hero-container {
  flex: 1;
  display: flex;
  padding:60px;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.hero-container .textbox {
  background: rgba(255, 255, 255, 0.9);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.button {
  margin: 10px 5px;
  padding: 10px 20px;
  background-color: #42A5A2;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background-color: #80CED6;
}

.button a {
  color: white;
  text-decoration: none;
}

/* Footer */
.footer {
  background-color: #333;
  color: white;
  text-align: center;
  padding: 10px;
}
</style>
