<template>
    <div class="manage-admins">
      <nav class="navbar">
        <router-link to="/AdminDashboard" >Admin Dashboard</router-link>
      </nav>
      <div class="hero-container">
        <div class="textbox">
          <h1>Manage Admins</h1>
          <p>Add or remove administrators using the options below:</p>
          <button  class="button">
              <router-link to="/AddAdmin" >Add New Admin</router-link>
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
        this.$router.push('/AddAdmin');
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


  .button:hover {
    background-color: #80CED6;
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



  .form-container h2 {
    margin-bottom: 20px;
    color: #333;
    text-align: center;
  }



  .form-group label {
    display: block;
    margin-bottom: 5px;
    color: #555;
  }

  .form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-group input:focus {
    outline: none;
    border-color: #42A5A2;
  }

  .form-group button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #42A5A2;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
  }

  .form-group button:hover {
    background-color: #80CED6;
  }

  </style>
