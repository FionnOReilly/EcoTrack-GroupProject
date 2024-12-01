<template>
  <div>
    <div class="dashboard-header">
      <h1>Dashboard</h1>
      <h2>Welcome, {{ user.first_name }}!</h2>
    </div>

    <!-- Waste Summary -->
    <div class="card" id="wasteSummary">
      <h3>Total Waste Volume: {{ totalWasteVolume }} L</h3>
      <h3>Recyclable Waste: {{ recyclablePercentage }}%</h3>
    </div>

    <!-- Waste Logs -->
    <div class="card" id="wasteLogs">
      <h3>Waste Logs</h3>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Waste Type</th>
            <th>Bag Size</th>
            <th>Volume (L)</th>
            <th>Carbon Saved (kg CO₂)</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(log, index) in wasteLogs" :key="index">
            <td>{{ log.date_of_disposal }}</td>
            <td>{{ log.waste_type }}</td>
            <td>{{ log.bag_size }}</td>
            <td>{{ calculateVolume(log.bag_size) }}</td>
            <td>{{ estimateCarbon(log.waste_type, calculateVolume(log.bag_size)) }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Waste Type Summary -->
    <div class="card" id="wasteTypeSummary">
      <h3>Waste Type Summary</h3>
      <ul>
        <li>Recyclable Waste: {{ carbonByType.recyclable }} kg CO₂ saved</li>
        <li>Organic Waste: {{ carbonByType.organic }} kg CO₂ saved</li>
        <li>General Waste: {{ carbonByType.general }} kg CO₂ saved</li>
        <li>Glass Waste: {{ carbonByType.glass }} kg CO₂ saved</li>
      </ul>
    </div>

    <!-- Total CO2 Equivalent Trees -->
    <div class="card" id="co2Equivalent">
      <h3>Total CO₂ Saved: {{ totalCarbonSaved }} kg CO₂</h3>
      <h3>Equivalent Number of Trees: {{ treesEquivalent }} trees</h3>
    </div>
  </div>
</template>

<script>
import axiosInstance from "@/plugins/axios.js";

export default {
  name: "DashboardPage",
  data() {
    return {
      user: {},
      wasteLogs: [],
      totalWasteVolume: 0,
      recyclablePercentage: 0,
      carbonByType: {
        recyclable: 0,
        organic: 0,
        general: 0,
        glass: 0,
      },
      totalCarbonSaved: 0,
      treesEquivalent: 0,
    };
  },
  methods: {
    fetchUserData() {
      const user = JSON.parse(localStorage.getItem("user"));
      if (user) {
        this.user = user;
      }
    },
    async fetchWasteLogs() {
      const token = localStorage.getItem("token");
      if (token) {
        try {
          const response = await axiosInstance.get(
            "http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/dashboardPage",
            {
              headers: { Authorization: `Bearer ${token}` },
            }
          );
          this.wasteLogs = response.data.data;
          console.log("Fetched waste logs:", this.wasteLogs);

          // Process data for the summary and carbon savings
          this.processWasteLogs();
          this.calculateSummary();
          this.calculateTotalCO2AndTrees();
        } catch (error) {
          console.error("Error fetching waste logs:", error);
        }
      }
    },
    calculateVolume(bagSize) {
      if (bagSize.includes("Small")) return 25;
      if (bagSize.includes("Medium")) return 50;
      if (bagSize.includes("Large")) return 100;
      return 0;
    },
    estimateCarbon(wasteType, volume) {
      const carbonFactors = {
        recyclable: 2,
        organic: 1,
        general: -0.5,
        glass: 0.8,
      };
      return (carbonFactors[wasteType] || 0) * volume;
    },
    processWasteLogs() {
      this.carbonByType = {
        recyclable: 0,
        organic: 0,
        general: 0,
        glass: 0,
      };

      this.wasteLogs.forEach((log) => {
        const volume = this.calculateVolume(log.bag_size);
        const carbonSaved = this.estimateCarbon(log.waste_type, volume);

        if (log.waste_type === "recyclable") {
          this.carbonByType.recyclable += carbonSaved;
        } else if (log.waste_type === "organic") {
          this.carbonByType.organic += carbonSaved;
        } else if (log.waste_type === "general") {
          this.carbonByType.general += carbonSaved;
        } else if (log.waste_type === "glass") {
          this.carbonByType.glass += carbonSaved;
        }
      });
      console.log("Carbon by type:", this.carbonByType);
    },
    calculateSummary() {
      let totalVolume = 0;
      let recyclableVolume = 0;

      this.wasteLogs.forEach((log) => {
        const volume = this.calculateVolume(log.bag_size);
        totalVolume += volume;

        if (log.is_recyclable === "Yes") {
          recyclableVolume += volume;
        }
      });

      this.totalWasteVolume = totalVolume;
      this.recyclablePercentage = totalVolume
        ? ((recyclableVolume / totalVolume) * 100).toFixed(2)
        : 0;
    },
    calculateTotalCO2AndTrees() {
      // Calculate the total CO2 saved from all waste types
      this.totalCarbonSaved = Object.values(this.carbonByType).reduce((acc, value) => acc + value, 0);

      // Calculate equivalent number of trees (1 tree absorbs 22 kg CO2 per year)
      this.treesEquivalent = (this.totalCarbonSaved / 22).toFixed(0); // Round to the nearest whole number
    },
  },
  mounted() {
    this.fetchWasteLogs();
    this.fetchUserData();
  },
};
</script>




<style scoped>
/* Preserving all previous styling */

.home-section {
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

#wasteChart {
  margin: 20px;
}

#wasteSummary {
  text-align: center;
  font-size: 18px;
  margin: 20px;
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
#carbonSaved {
  width: 100%;
  height: 400px;
  border: 1px solid #ccc;
  background-color: rgba(0, 0, 0, 0.1); /* Temporary background for debugging */
}


</style>
