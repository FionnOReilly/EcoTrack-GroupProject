<template>
  <section class="home-section">
    <div class="hero-container">
      <div class="container1">
        <div class="textbox" v-if="user && wasteLogs.length">
          <h1>Welcome, {{ user.first_name }}!</h1>
          <p>Your waste logs:</p>
          <table>
            <tr>
              <th>Waste Type</th>
              <th>Bag Size</th>
              <th>Recyclable</th>
              <th>Date of Disposal</th>
            </tr>
            <tr v-for="log in wasteLogs" :key="log.id">
              <td>{{ log.type }}</td>
              <td>{{ log.size }}</td>
              <td>{{ log.recyclable }}</td>
              <td>{{ log.date }}</td>
            </tr>
          </table>
          <button @click="logout">Logout</button>
        </div>
        <div class="textbox" v-else>
          <h1>Welcome!</h1>
          <p v-if="!user">You are not logged in. Please <a @click="redirectToLogin" href="#">log in</a>.</p>
          <p v-else-if="error">There was an error loading your waste logs: {{ error }}</p>
          <p v-else>Loading your data, please wait...</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UserDashboard',
  data() {
    return {
      user: null,
      wasteLogs: [],
      error: null, // For error messages
    };
  },
  mounted() {
    this.checkAuth();
  },
  methods: {
    checkAuth() {
      // Retrieve user and token from localStorage
      const user = localStorage.getItem('user');
      const token = localStorage.getItem('token');

      if (user && token) {
        this.user = JSON.parse(user);
        this.fetchWasteLogs();
      } else {
        // Redirect to login if not authenticated
        this.$router.push('/Login');
      }
    },
    async fetchWasteLogs() {
      const token = localStorage.getItem('token');
      const userId = this.user?.id;

      if (!token || !userId) {
        this.error = "You are not authorized to view this data.";
        return;
      }

      try {
        const response = await axios.get(`http://localhost:8081/CI4-EcoTrack/public/wastelog/user/${userId}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        });
        this.wasteLogs = response.data.data; // Adjust this based on your API response structure
      } catch (error) {
        console.error("Error fetching waste logs:", error);
        if (error.response && error.response.status === 401) {
          this.error = "Your session has expired. Please log in again.";
          this.logout();
        } else {
          this.error = "Unable to fetch your waste logs. Please try again later.";
        }
      }
    },
    logout() {
      localStorage.removeItem('user');
      localStorage.removeItem('token');
      this.$router.push('/Login');
    },
    redirectToLogin() {
      this.$router.push('/Login');
    },
  },
};
</script>

<style scoped>
.home-section {
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.hero-container {
  height: 100%;
  width: 100%;
  background-image: url('../assets/images/HomePageHero.png');
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  position: relative;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.container1 {
  text-align: center;
}

.textbox {
  background-color: rgba(255, 255, 255, 0.75);
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  width: 450px;
  max-width: 90%;
  margin: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  padding: 10px;
  text-align: center;
  border: 1px solid #2D2828C6;
}

th {
  background-color: #71BAC1;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

button {
  background-color: #42A5A2;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  margin-top: 20px;
}

button:hover {
  background-color: #80CED6;
}
</style>
