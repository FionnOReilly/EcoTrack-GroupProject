<template>
  <div class="grid-container">
    <!-- User Display Section -->
    <div id="loggedAdmin">
      <h4>Users List</h4>
      <table>
        <tr>
          <th>Admin ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
        <tr v-for="admin in admins" :key="admin.admin_id">
          <td>{{ admin.admin_id }}</td>
          <td>{{ admin.f_name }}</td>
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
        f_name: '',
        email: '',
        password: '',
        created_at: '',
        updated_at: '',
      },
      formErrors: {
        admin_id: '',
        f_name: '',
        email: '',
        password: '',
        created_at: '',
        updated_at: '',
      },
      admins: [], // Initialize 'users' as an empty array
    };
  },
  methods: {
    async getAdmins() {
      try {
        const response = await axios.get('http://localhost:8081/CI4-EcoTrack/public/api/admins');
        console.log('API Response:', response.data);  // Debug log to see the API response
        this.admin = response.data;  // Store users in 'users' data property
      } catch (error) {
        console.error("Error fetching admin:", error);
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
    editAdmin(admin_id) {
      console.log(`Edit admin with ID: ${admin_id}`);
      // Implement edit functionality
    },
    deleteAdmin(admin_id) {
      console.log(`Delete admin with ID: ${admin_id}`);
      // Implement delete functionality
    },
  },
  mounted() {
    this.getAdmins(); // Fetch users when the component is mounted
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
