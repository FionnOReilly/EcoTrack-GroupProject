<template>
  <h1 id="leaderboardTitle">Leaderboard</h1>
  <div class="leaderboard" style="margin:10px;">
    <div class="leaderboard-section">
      <table>
        <thead>
        <tr>
          <th>Rank</th>
          <th>Member Name</th>
          <th>Points</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="leader in leaderboardPoints" :key="leader.user_id">
          <td class="leader-box">{{ leader.rank }}</td>
          <td class="leader-box">{{ leader.username }}</td>
          <td class="leader-box">{{ leader.current_points }}</td>
        </tr>

        </tbody>
      </table>
    </div>
    <div class="leaderboard-section">
      <table>
        <thead>
        <tr>
          <th>Rank</th>
          <th>Member Name</th>
          <th>Points</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="i in 5" :key="'empty-' + i">
          <td>{{i+5}}</td>
          <!--          <td class="leader-box">{{ leader.rank }}</td>-->
          <!--          <td class="leader-box">{{ leader.username }}</td>-->
          <!--          <td class="leader-box">{{ leader.current_points }}</td>-->
        </tr>

        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';


export default {
  name: 'LeaderboardPage',
  data() {
    return {
      leaderboardPoints: []
    };
  },
  methods: {
    async getLeaderboardPoints() {
      try {
       // this.leaderboardPoints=[];
        const response = await axios.get('http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/leaderboard');
        console.log("Fetched Data:", response.data);
        this.leaderboardPoints = response.data;
      } catch (error) {
        console.error("Error fetching results:", error);
      }
    },
  },
  mounted() {
    this.getLeaderboardPoints();
  }
};

</script>

<style scoped>


/* General Styling */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f4e3;
  color: #333;
}

header {
  background-color: #4ba3a4;
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header .logo img {
  height: 60px;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  gap: 20px;
}

nav ul li {
  display: inline;
}

nav ul li a {
  text-decoration: none;
  color: white;
  font-weight: bold;
}

main {
  padding: 20px;
  text-align: center;
}

#leaderboardTitle {
text-align: center;
  font-size: 2rem;
  margin-bottom: 20px;
}

.leaderboard {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.leaderboard-section {
  background-color: #d2f1f3;
  padding: 20px;
  border-radius: 10px;
  width: 45%;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th, table td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: center;
}

footer {
  background-color: #4ba3a4;
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: white;
}

.footer-links {
  display: flex;
  gap: 10px;
}

.footer-links img {
  height: 40px;
}

.footer-contact {
  text-align: right;
}

</style>
<script setup>
</script>