<template>
  <div class="hero-container">
    <div class="textbox">
      <h1>Welcome Admin</h1>
      <p>This is the Admin Home page. Use the buttons below to manage users and admins.</p>
      <button class="button" @click="navigateTo('/ManageUsers')">
        Manage Users
      </button>
      <button class="button" @click="navigateTo('/manage-admin')">
        Manage Admins
      </button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    navigateTo(route) {
      this.$router.push(route);
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
  
  /* Hero Section */
  .hero-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 200px;
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
  