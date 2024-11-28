<template>
  <div class="grid-container">
    <!-- User Display Section -->
    <div id="loggedUsers">
      <h4>Users List</h4>
      <table>
        <tr>
          <th>User ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
        <tr v-for="user in users" :key="user.user_id">
          <td>{{ user.user_id }}</td>
          <td>{{ user.first_name }}</td>
          <td>{{ user.last_name }}</td>
          <td>{{ user.username }}</td>
          <td>{{ formatDate(user.created_at) }}</td>
          <td>{{ formatDate(user.updated_at) }}</td>
          <td>
            <button @click="editUser(user.user_id)">Edit</button>
            <button @click="deleteUser(user.user_id)">Delete</button>
          </td>
        </tr>
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
      user: {
        user_id: '',
        first_name: '',
        last_name: '',
        email: '',
        created_at: '',
        updated_at: '',
      },
      formErrors: {
        user_id: '',
        first_name: '',
        last_name: '',
        email: '',
        created_at: '',
        updated_at: '',
      },
      users: [], // Initialize 'users' as an empty array
    };
  },
  methods: {
    async getUsers() {
      try {
        const response = await axios.get('http://localhost:8081/CI4-EcoTrack/public/api/users');
        console.log('API Response:', response.data);  // Debug log to see the API response
        this.users = response.data;  // Store users in 'users' data property
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      if (isNaN(date.getTime())) {
        return ''; // Return empty string if the date is invalid
      }
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      return date.toLocaleDateString(undefined, options);
    },
    editUser(userId) {
      console.log(`Edit user with ID: ${userId}`);
      // Implement edit functionality
    },
    deleteUser(userId) {
      console.log(`Delete user with ID: ${userId}`);
      // Implement delete functionality
    },
  },
  mounted() {
    this.getUsers(); // Fetch users when the component is mounted
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

@media only screen and (max-width: 767px) {
  .grid-container {
    grid-template-columns: repeat(5, 20%);
    grid-row-gap: 2em;
  }

  #loggedUsers {
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

  #loggedUsers table {
    margin-top: 20px;
  }
}
</style>
