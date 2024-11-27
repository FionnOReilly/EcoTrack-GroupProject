<template>
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
            <td>{{ user.first_name }}</td>
            <td>{{ user.last_name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ formatDate(user.created_at) }}</td>
            <td>{{ formatDate(user.updated_at) }}</td>
            <td>
              <button @click="editUser(user.id)">Edit</button>
              <button @click="deleteUser(user.id)">Delete</button>
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
    // Fetch all users from the API
    async fetchUsers() {
      try {
        const response = await axios.get('http://localhost:8081/CI4-EcoTrack/public/users');
        this.users = response.data; // Store the fetched users
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    },

    // Format date to a readable format
    formatDate(dateString) {
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      const date = new Date(dateString);
      return date.toLocaleDateString(undefined, options);
    },

    // Edit user functionality (can be expanded later to open an edit form)
    async editUser(userId) {
      console.log(`Edit user with ID: ${userId}`);
      // Example: Send a PUT request to update user details
      const userToEdit = this.users.find(user => user.id === userId);
      if (userToEdit) {
        try {
          const updatedData = {
            first_name: userToEdit.first_name,
            last_name: userToEdit.last_name,
            email: userToEdit.email, // You can add more fields as needed
          };

          const response = await axios.put(`http://localhost:8081/CI4-EcoTrack/public/users/${userId}`, updatedData);
          console.log('User updated:', response.data);
          this.fetchUsers(); // Re-fetch users to get the updated list
        } catch (error) {
          console.error('Error editing user:', error);
        }
      }
    },

    // Delete user functionality
    async deleteUser(userId) {
  console.log(`Delete user with ID: ${userId}`);
  try {
    const response = await axios.delete(`http://localhost:8081/CI4-EcoTrack/public/users/${userId}`);
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
.grid-container {
  display: grid;
  grid-template-columns: 100%;
  margin-bottom: 15px;
}

#loggedUsers {
  margin-top: 20px;
}

#loggedUsers table {
  width: 100%;
  border-collapse: collapse;
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

#loggedUsers button {
  padding: 5px;
  margin: 5px;
  background-color: #3ED2AA;
  border: none;
  color: white;
  cursor: pointer;
}

#loggedUsers button:hover {
  background-color: #adffe7;
}
</style>
