<template>
  <h1 id="leaderboardTitle">Leaderboard</h1>
  <div class="leaderboard">
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
        <tr>
          <td>1</td>
          <td>Joe Bloggs</td>
          <td>5,000</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jane Doe</td>
          <td>4,900</td>
        </tr>
        <tr>
          <td>3</td>
          <td>John Wayne</td>
          <td>4,875</td>
        </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>5</td>
          <td></td>
          <td></td>
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
        <tr>
          <td>6</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>7</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>8</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>9</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>10</td>
          <td></td>
          <td></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>



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