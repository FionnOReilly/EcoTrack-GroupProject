<template>
  <nav class="navbar">
    <router-link to="/AdminDashboard" >Admin Dashboard</router-link>
  </nav>
    <div class="grid-container">


      <!-- User Display Section -->
      <div id="loggedAdmin">
        <h4>Users List</h4>
        <table>
          <tr>
            <th>Admin ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
          <tr v-for="admin in admins" :key="admin.admin_id">
            <td>{{ admin.admin_id }}</td>
            <td>{{ admin.first_name }}</td>
            <td>{{ admin.last_name }}</td>
            <td>{{ admin.email }}</td>
            <td>{{ admin.password }}</td>
            <td>{{ formatDate(admin.created_at) }}</td>
            <td>{{ formatDate(admin.updated_at) }}</td>
            <td>
              <button @click="editUser(admin.admin_id)">Edit</button>
              <button @click="deleteUser(admin.admin_id)">Delete</button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    name: 'AdminPage',
    data() {
      return {
        admin: {
          admin_id: '',
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          created_at: '',
          updated_at: '',
        },
        formErrors: {
          admin_id: '',
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          created_at: '',
          updated_at: '',
        },
        admins: [],
      };
    },
    methods: {
      async getAdmins() {
        try {
          const response = await axios.get('http://localhost:8081/CI4-EcoTrack/public/api/admins');
          console.log('API Response:', response.data);
          this.admin = response.data;
        } catch (error) {
          console.error("Error fetching admin:", error);
        }
      },
      formatDate(dateString) {
        const date = new Date(dateString);
        if (isNaN(date.getTime())) {
          return '';
        }
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString(undefined, options);
      },
      editAdmin(admin_id) {
        console.log(`Edit admin with ID: ${admin_id}`);

      },
      deleteAdmin(admin_id) {
        console.log(`Delete admin with ID: ${admin_id}`);

      },
    },
    mounted() {
      this.getAdmins();
    },
  };
  </script>


  <style scoped>

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
  .grid-container {
    display: grid;
    grid-template-columns: 100%;
    margin-bottom: 15px;
  }

  #loggedAdmin {
    margin-top: 20px;
  }

  #loggedAdmin table {
    width: 100%;
    border-collapse: collapse;
  }

  #loggedAdmin th, #loggedUsers td {
    padding: 10px;
    text-align: center;
    border: 1px solid #2D2828C6;
  }

  #loggedAdmin th {
    background-color: #71BAC1;
    color: #2D2828;
    font-weight: bold;
  }

  #loggedAdmin tr {
    background-color: #FFFEEF;
  }

  #loggedAdmin tr:hover {
    background-color: #C8DFE0;
  }

  #loggedAdmin button {
    padding: 5px;
    margin: 5px;
    background-color: #3ED2AA;
    border: none;
    color: white;
    cursor: pointer;
  }

  #loggedAdmin button:hover {
    background-color: #adffe7;
  }

  @media only screen and (max-width: 767px) {
    .grid-container {
      grid-template-columns: repeat(5, 20%);
      grid-row-gap: 2em;
    }

    #loggedAdmin {
      margin: 0;
      grid-column: 1/6;
    }

    label {
      width: 50%;
      margin-left: 60px;
      text-align: left;
      display: block;
    }

    select,
    input[type="text"],
    input[type="date"] {
      display: block;
      width: 70%;
      margin-left: 70px;
    }

    #loggedAdmin table {
      margin-top: 20px;
    }
  }
  </style>
