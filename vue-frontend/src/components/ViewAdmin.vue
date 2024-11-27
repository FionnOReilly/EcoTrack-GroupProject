<template>
    <div class="manage-users">
      <!-- Navbar -->
      <nav class="navbar">
        <div><a href="#">Admin Dashboard</a></div>
        <div>
          <router-link to="/AdminHome" >Home</router-link>
          <a href="#">Logout</a>
        </div>
      </nav>
  
      <!-- Main Content -->
      <div class="content">
        <h1>Manage Admins</h1>
        <p>View and manage all registered admin below:</p>
        <table>
          <thead>
            <tr>
              <th>Admin ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="admin in admins" :key="admin.id">
              <td>{{ admin.id }}</td>
              <td>{{ admin.name }}</td>
              <td>{{ admin.email }}</td>
              <td>{{ admin.password }}</td>
              <td>
                <button class="button" @click="editAdmin(admin.id)">Edit</button>
                <button class="button" @click="deleteAdmin(admin.id)">Delete</button>
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
    name: "ManageAdmin",
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

    //   async getUsers() {
    //     const response = await axios.get(
    //         'http://localhost:8081/CI4-EcoTrack/public/users');
    //            this.users = response.data;

    // },
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
  