<template>
  <h1 id="GoalsTitle">Goals</h1>
  <table class="goals-table">
    <tr>
      <th>User ID</th>
      <th>Username</th>
      <th>Current Points</th>
    </tr>

    <tr v-for="goal in userGoals" :key="goal.user_id">
      <td class="goal-box">{{ goal.user_id }}</td>
      <td class="goal-box">{{ goal.user_name }}</td>
      <td class="goal-box">{{ goal.current_points }}</td>
    </tr>
  </table>

  <div class="goals-chart">
    <img src="@/assets/images/dataChart.png" alt="Chart showing waste data">
  </div>
  <div class="buttonContainer">
    <input type="submit" value="LeaderBoard" class="contactButton" id="LeaderBoard" @click="goToLeaderBoard">
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UserGoalsPage',
  data() {
    return {
      userGoals: [],      };
  },
  methods: {
    async getUserGoals() {

      try {
        const response = await axios.get('http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/userGoals');
        console.log("Fetched Data:", response.data);
        this.userGoals = response.data;
      } catch (error) {
        console.error("Error fetching user goals:", error);
      }
    },
    goToLeaderBoard() {
      this.$router.push('/LeaderBoard');
    }
  },
  mounted() {
    this.getUserGoals();    }
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

#GoalsTitle {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 20px;
}

.goals-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
  background-color: #fff;
}

.goals-table th,
.goals-table td {
  border: 1px solid #ddd;
  padding: 12px;
  text-align: center;
}

.goals-table th {
  background-color: #d2f1f3;
}

.goal-box {
  padding: 15px;
  border: none; }

.goals-chart {
  text-align: center;
  padding: 20px;
}

.goals-chart img {
  width: 100%;
  max-width: 600px;
  height: auto;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
  border: 4px solid #2D2828C6;
  border-radius: 10px;
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
.contactButton:hover {
  border-radius: 20px;
}

#LeaderBoard:hover {
  background-color: #adffe7;
}

.buttonContainer {
  text-align: center;
  margin: 20px;
  margin-left:300px;
}

#LeaderBoard {
  padding: 10px 20px;
  margin: 5px;
  width: 10em;
  font-weight: bold;
  font-size: 1.2em;
  color: black;
  background-color: #3ED2AA;
  border-radius: 10px;
}

.contactButton {
  border: 4px solid #2D2828C6;
  border-radius: 10px;
}

.goals-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.goals-table th,
.goals-table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

.goals-table th {
  background-color: #d2f1f3;
}

</style>