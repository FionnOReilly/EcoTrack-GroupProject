<template>
    <div class="add-admin">
      <!-- Navbar -->
      <nav class="navbar">
        <div><a href="#">Admin Dashboard</a></div>
        <div>
          <a href="adminHome.html">Home</a>
          <a href="#">Logout</a>
        </div>
      </nav>
  
      <!-- Main Content -->
      <div class="content">
        <div class="form-container">
          <h2>New Admin Details</h2>
          <form @submit.prevent="submitAdminDetails">
            <div class="form-group">
              <label for="adminName">Admin Name:</label>
              <input
                type="text"
                id="adminName"
                v-model="adminName"
                placeholder="Enter admin's full name"
                required
              />
            </div>
            <div class="form-group">
              <label for="adminEmail">Admin Email:</label>
              <input
                type="email"
                id="email"
                v-model="adminEmail"
                placeholder="Enter admin's email address"
                required
              />
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input
                type="password"
                id="password"
                v-model="adminPassword"
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
  export default {
    name: "AddAdmin",
    data() {
      return {
        adminName: "",
        adminEmail: "",
        adminPassword: "",
      };
    },
    methods: {
      submitAdminDetails() {
        // Handle form submission logic here
        const adminDetails = {
          name: this.adminName,
          email: this.adminEmail,
          password: this.adminPassword,
        };
        console.log("Admin Details Submitted:", adminDetails);
        alert("Admin successfully added!");
        // Replace the following with actual API or server call
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
  