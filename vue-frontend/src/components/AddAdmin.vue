<template>
    <div class="add-admin">
      <!-- Navbar -->
      <nav class="navbar">
        <div><a href="#">Admin Dashboard</a></div>
        <div>
          <router-link to="/AdminDashboard" >Home</router-link>
          <a href="#">Logout</a>
        </div>
      </nav>
  
      <!-- Main Content -->
      <div class="content">
        <div class="form-container">
          <h2>New Admin Details</h2>
          <form @submit.prevent="submitAdminDetails">
            <div class="form-group">
              <label for="first_name">First Name:</label>
              <input
                type="text"
                id="first_name"
                v-model="first_name"
                placeholder="Enter first name"
                required
              />
            </div>
            <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input
                type="text"
                id="last_name"
                v-model="last_name"
                placeholder="Enter Last name"
                required
              />
            </div>
            <div class="form-group">
              <label for="Email">Admin Email:</label>
              <input
                type="email"
                id="Email"
                v-model="adminEmail"
                placeholder="Enter email address"
                required
              />
            </div>
            <div class="form-group">
              <label for="Password">Password:</label>
              <input
                type="password"
                id="Password"
                v-model="Password"
                placeholder="Enter a strong password"
                required
              />
            </div>
            <div class="form-group">
              <button type="submit">Add Admin</button>
            </div>
          </form>
        </div>
      </div>
  
      <!-- Footer -->
      <footer class="footer">
        <p>&copy; 2024 Admin Dashboard | All Rights Reserved</p>
      </footer>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  export default {
    name: "add-admin",
    data() {
      return {
        first_name: "",
        last_name: "",
        Email: "",
        Password: "",
      };
    },
    methods: {
      async submitAdminDetails() {
  const adminDetails = {
    first_name: this.first_name,
    last_name: this.last_name,
    email: this.adminEmail,
    password: this.Password,
  };

  try {
    const response = await axios.post('http://localhost:8081/CI4-EcoTrack/public/InsertAdmin', adminDetails);
    console.log("Admin added successfully:", response.data);
    alert("Admin successfully added!");
  } catch (error) {
    console.error("Error details:", error);
    if (error.response) {
      console.error("Server response error:", error.response.data);
      alert(`Error: ${error.response.data.message || 'Failed to add admin'}`);
    } else {
      alert("Network error. Ensure the server is running and reachable.");
    }
  }
}}};
  
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
  
  /* Main Content */
  .content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }
  
  .form-container {
    background-color: white;
    padding: 20px;
    width: 60%;
    max-width: 500px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }
  
  .form-container h2 {
    margin-bottom: 20px;
    color: #333;
    text-align: center;
  }
  
  .form-group {
    margin-bottom: 20px;
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
  
  /* Footer */
  .footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
  }
  </style>
  