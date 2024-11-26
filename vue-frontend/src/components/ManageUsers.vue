<template>
    <div class="manage-users">
      <!-- Navbar -->
      <nav class="navbar">
        <div><a href="#">Admin Dashboard</a></div>
        <div>
          <a href="AdminHome.vue">Home</a>
          <a href="#">Logout</a>
        </div>
      </nav>
  
      <!-- Main Content -->
      <div class="content">
        <h1>Manage Users</h1>
        <p>View and manage all registered users below:</p>
        <table>
          <thead>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td>{{ user.id }}</td>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.password }}</td>
              <td>
                <button class="button" @click="editUser(user.id)">Edit</button>
                <button class="button" @click="deleteUser(user.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- Footer -->
      <footer class="footer">
        <p>&copy; 2024 Admin Dashboard | All Rights Reserved</p>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: "ManageUsers",
    data() {
    return {
        f_name: {
        l_name: '',
        email: '',
        password: '',
       
      },
      formErrors: {
        FirstName: '',
        LastName: '',
        Email: '',
        Password: '',
       
      },
      wasteLogs: [],
    };
  },
    methods: {
      editUser(id) {
        alert(`Edit user with ID: ${id}`);
        // Replace with actual logic, e.g., navigate to an edit form or open a modal
      },
      deleteUser(id) {
        const confirmed = confirm("Are you sure you want to delete this user?");
        if (confirmed) {
          this.users = this.users.filter((user) => user.id !== id);
          alert(`User with ID: ${id} deleted successfully.`);
        }
      },
      updateUser() {
      const index = this.users.findIndex((user) => user.id === this.editedUser.id);
      if (index !== -1) {
        this.users.splice(index, 1, this.editedUser);
        this.isEditing = false;
        alert(`User with ID: ${this.editedUser.id} updated successfully.`);
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
  
  /* Main Content */
  .content {
    flex: 1;
    padding: 20px;
    text-align: center;
  }
  
  table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  
  th,
  td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
  }
  
  th {
    background-color: #42A5A2;
    color: white;
  }
  
  .button {
    margin: 10px 5px;
    padding: 10px 20px;
    background-color: #42A5A2;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
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
  