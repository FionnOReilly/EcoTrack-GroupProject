<template>
    <div class="manage-admins">
      <!-- Navbar -->
      <nav class="navbar">
        <div><a href="#">Admin Dashboard</a></div>
        <div>
          <router-link to="/AdminHome" >Home</router-link>
          <a href="#">Logout</a>
        </div>
      </nav>
  
      <!-- Hero Section -->
      <div class="hero-container">
        <div class="textbox">
          <h1>Manage Admins</h1>
          <p>Add or remove administrators using the options below:</p>
          <button  class="button">
              <router-link to="/InsertAdmin" >Add New Admin</router-link>
            </button>
            <button  class="button">
              <router-link to="/ViewAdmin" > View Admin </router-link>
            </button>
        </div>
      </div>
  
    
      
    </div>
  </template>
  
  <script>
  export default {
    name: "ManageAdmins",
    methods: {
      navigateToAddAdmin() {
     
        this.$router.push('/InsertAdmin');
      },
      viewAdminList() {
     
        this.$router.push('/ViewAdmin');
        
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
    padding: 60px;
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
    text-decoration: none;
  }

  .button-link {
  text-decoration: none;
  color: white;
  display: inline-block;
}
  
  .button:hover {
    background-color: #80CED6;
  }
  
  /* Footer */
  .footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
  }
  </style>
  