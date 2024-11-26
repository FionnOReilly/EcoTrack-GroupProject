<template>
  <section class="home-section">
    <div class="hero-container">
      <div class="container1">
        <div class="textbox">
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
      user: {},
      wasteLogs: []
    };
  },
  mounted() {
    this.fetchUserData();
    this.fetchWasteLogs();
  },
  methods: {
    fetchUserData() {
      const user = JSON.parse(localStorage.getItem('user'));
      if (user) {
        this.user = user;
      }
    },
    async fetchWasteLogs() {
      const token = localStorage.getItem('token');
      if (token) {
        try {
          const response = await axios.get('http://localhost:8081/CI4-EcoTrack/public/wastelog', {
            headers: {
              Authorization: `Bearer ${token}`
            }
          });
          this.wasteLogs = response.data;
        } catch (error) {
          console.error("Error fetching waste logs:", error);
          alert("Unable to fetch your waste logs. Please try again later.");
        }
      }
    }
  }
};
</script>

<style scoped>
/* Reuse the styles you already have for the home page */
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
}

button:hover {
  background-color: #80CED6;
}
</style>
