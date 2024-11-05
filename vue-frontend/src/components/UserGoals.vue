<script setup>

</script>

<template>
  <h1 id="GoalsTitle">Goals</h1>
  <div class="goals-container">
    <div class="goals-sidebar">
      <div class="goal-box">Current Points: 500</div>
      <div class="goal-box">This Month's Goal: 5000</div>
      <div class="goal-box">Last Month's Achievement: 4500</div>
    </div>
    <div class="goals-chart">
      <img src="@/assets/images/dataChart.png" alt="Chart showing waste data">
    </div>
  </div>
  <div class="buttonContainer">
    <input type="submit" value="LeaderBoard" class="contactButton" id="LeaderBoard" @click="goToLeaderBoard">
  </div>
</template>

<script>
export default {
  methods: {
    goToLeaderBoard() {
      this.$router.push('/LeaderBoard'); // Navigate to LeaderBoard route
    }
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

#GoalsTitle {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 20px;
}

.goals-container {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 20px;
}

.goals-sidebar {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.goal-box {
  background-color: #d2f1f3;
  padding: 20px;
  border-radius: 10px;
  width: 300px;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
  text-align: left;
}

.goals-chart img {
  width: 500px;
  height: auto;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
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
  margin: 10px;
}

#LeaderBoard {
  padding: 5px;
  margin:5px;
  width: 7em;
  font-weight: bold;
  color: black;
}
#LeaderBoard{
  background-color: #3ED2AA
}

.contactButton {
  border: 4px solid #2D2828C6;
  border-radius: 10px;
}
</style>