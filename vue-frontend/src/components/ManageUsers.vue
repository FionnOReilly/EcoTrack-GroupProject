<template>

  <nav class="navbar">
    <router-link to="/AdminDashboard" >Admin Dashboard</router-link>
  </nav>
    <div class="grid-container">


      <!-- User Display Section -->
      <div id="loggedUsers">
        <h4>Users List</h4>
        <table>
          <thead>
          <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>
              <input v-if="user.editing" v-model="user.first_name" />
              <span v-else>{{ user.first_name }}</span>
            </td>
            <td>
              <input v-if="user.editing" v-model="user.last_name" />
              <span v-else>{{ user.last_name }}</span>
            </td>
            <td>
              <input v-if="user.editing" v-model="user.email" />
              <span v-else>{{ user.email }}</span>
            </td>
            <td>{{ formatDate(user.created_at) }}</td>
            <td>{{ formatDate(user.updated_at) }}</td>
            <td>
              <button @click="toggleEdit(user)" class="contactButton" id="primaryButton">
                {{ user.editing ? 'Save' : 'Edit' }}
              </button>
              <button v-if="user.editing" @click="cancelEdit(user)" class="contactButton">
                Cancel
              </button>
              <button @click="deleteUser(user.id)" class="contactButton" id="secondaryButton">Delete</button>
            </td>
          </tr>
  
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'UsersPage',
    data() {
      return {
        users: [], // Array to store users
      };
    },
    methods: {
     
      async fetchUsers() {
        try {
          const response = await axios.get('http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/users');
          this.users = response.data; 
        } catch (error) {
          console.error('Error fetching users:', error);
        }
      },
  
      
      formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        const date = new Date(dateString);
        return date.toLocaleDateString(undefined, options);
      },
  
     
      async editUser(userId) {
        console.log(`Edit user with ID: ${userId}`);
        const userToEdit = this.users.find(user => user.id === userId);
  
        if (userToEdit) {
          try {
            const updatedData = {
              first_name: userToEdit.first_name,
              last_name: userToEdit.last_name,
              email: userToEdit.email,
            };
  
            const response = await axios.put(`http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/users/${userId}`, updatedData);
            console.log('User updated:', response.data);
            this.fetchUsers(); // Refresh users
          } catch (error) {
            console.error('Error editing user:', error);
          }
        }
      },
  
      toggleEdit(user) {
        user.editing = !user.editing;
        if (!user.editing) {
          // Save changes when exiting edit mode
          this.editUser(user.id);
        }
      },
      cancelEdit(user) {
        user.editing = false;
        this.fetchUsers(); // Revert changes by re-fetching the list
      },
  
      // Delete user functionality
      async deleteUser(userId) {
        console.log(`Delete user with ID: ${userId}`);
        try {
          const response = await axios.delete(`http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/users/${userId}`);
          console.log('User deleted:', response.data);
          this.fetchUsers(); // Re-fetch users to get the updated list
        } catch (error) {
          console.error('Error deleting user:', error.response ? error.response.data : error.message);
        }
      },
    },
    mounted() {
      this.fetchUsers(); // Fetch users when the component is mounted
    },
  };
  </script>
  
  <style scoped>
  /* Centering the grid container horizontally and keeping the table at the top */

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



  .grid-container {
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Keeps the content at the top */
    align-items: center; /* Centers horizontally */
    height: auto; /* Allows content to grow without stretching the entire viewport */
    margin-bottom: 55px;
  }
  
  /* Styling for the "Users List" and table */
  #loggedUsers {
    margin-top: 10px; /* Reduced the margin-top for less space above the table */
    text-align: center; /* Center the "Users List" heading */
    width: 70%; /* Set the width to 70% of the parent container */
  }
  
  #loggedUsers h4 {
    text-align: center; /* Ensure the heading is centered */
  }
  
  #loggedUsers table {
    width: 100%; /* The table takes the full width of its container */
    border-collapse: collapse;
    margin: 0 auto; /* Ensure the table is centered horizontally */
  }
  
  #loggedUsers th, #loggedUsers td {
    padding: 10px;
    text-align: center;
    border: 1px solid #2D2828C6;
  }
  
  #loggedUsers th {
    background-color: #71BAC1;
    color: #2D2828;
    font-weight: bold;
  }
  
  #loggedUsers tr {
    background-color: #FFFEEF;
  }
  
  #loggedUsers tr:hover {
    background-color: #C8DFE0;
  }
  
  /* Primary Button (Edit) Styling */
  #primaryButton {
    padding: 5px;
    margin: 5px;
    width: 7em; /* Set width */
    font-weight: bold; /* Make the text bold */
    color: black; /* Black text */
    background-color: #3ED2AA; /* Green background */
    border: none;
    border-radius: 10px; /* Rounded corners */
    cursor: pointer;
  }
  
  #primaryButton:hover {
    background-color: #adffe7; /* Light green on hover */
    border-radius: 20px; /* Slightly more rounded corners on hover */
  }
  
  
  #secondaryButton {
    padding: 5px;
    margin: 5px;
    width: 7em; /* Set width */
    font-weight: bold; /* Make the text bold */
    color: black; /* Black text */
    background-color: #F79181; /* Red background */
    border: none;
    border-radius: 10px; /* Rounded corners */
    cursor: pointer;
  }
  
  #secondaryButton:hover {
    background-color: #fab3a1; /* Lighter red on hover */
    border-radius: 20px; /* Slightly more rounded corners on hover */
  }
  
  /* Contact Button Styling */
  .contactButton {
    border: 4px solid #2D2828C6;
    border-radius: 10px;
    padding: 5px;
    background-color: transparent;
    cursor: pointer;
  }
  
  .contactButton:hover {
    border-radius: 20px; /* More rounded corners on hover */
  }
  
  /* Mobile view adjustments */
  @media only screen and (max-width: 767px) {
    .grid-container {
      grid-template-columns: repeat(5, 20%);
      grid-row-gap: 2em;
    }
  
    form, #loggedWaste {
      margin: 0;
      grid-column: 1/6;
    }
  
    .error {
      display: block;
      margin-left: 39%;
    }
  
    #service {
      width: 39%;
    }
  
    label {
      width: 50%;
      margin-left: 60px;
      text-align: left;
      display: block;
    }
  
    select, input[type="text"], input[type="date"] {
      display: block;
      width: 70%;
      margin-left: 70px;
    }
  
    input[type="radio"] {
      margin-left: 70px;
    }
  
    #loggedWaste {
      margin: 0px;
    }
  }
  
  /* Desktop view adjustments */
  @media only screen and (min-width: 992px) {
    .grid-container {
      grid-template-columns: repeat(16, 6.25%);
      grid-row-gap: 2em;
    }
  
    form, #loggedWaste {
      grid-column: 5/13;
    }
  
    label {
      width: 40%;
    }
  }
  </style>
  
