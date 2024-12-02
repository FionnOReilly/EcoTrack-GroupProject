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
            const sizeMap = { Small: 25, Medium: 50, Large: 100 };
            const sizeKey = bagSize.match(/Small|Medium|Large/);
            return sizeKey ? sizeMap[sizeKey[0]] : 0;
        },
        estimateCarbon(wasteType, volume) {
    const densityFactors = { recyclable: 0.15, organic: 0.5, general: 0.7, glass: 2.5 };
    // Set positive factors for recyclable types
    const carbonFactors = { recyclable: 0.085, organic: 0.12, general: -0.75, glass: 0.12 };  // Glass and organic as positive

    const weight = (densityFactors[wasteType] || 0) * volume;
    return weight * (carbonFactors[wasteType] || 0);
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

        if (Object.prototype.hasOwnProperty.call(this.carbonByType, log.waste_type)) {
            this.carbonByType[log.waste_type] += parseFloat(carbonSaved.toFixed(2));
        } else {
            console.warn(`Unexpected waste type: ${log.waste_type}`);
        }
    });
    console.log("Updated carbon by type:", this.carbonByType);
}
,
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

            console.log("Summary calculated:", {
                totalVolume: this.totalWasteVolume,
                recyclablePercentage: this.recyclablePercentage,
            });
        },
    calculateTotalCO2AndTrees() {
    this.totalCarbonSaved = parseFloat(
        Object.values(this.carbonByType).reduce((acc, value) => acc + value, 0).toFixed(2)
    );
    this.treesEquivalent = Math.round(this.totalCarbonSaved / 22);
    console.log("Total CO2 and Trees calculated:", {
        totalCarbonSaved: this.totalCarbonSaved,
        treesEquivalent: this.treesEquivalent,
    });
},
    },
    mounted() {
        this.fetchWasteLogs();
        this.fetchUserData();
    },
};
</script>


<style scoped>
/* Dashboard Background */
.dashboard-container {
    padding: 20px;
    background: linear-gradient(to right, #e3fdfd, #f1f1f1);
    font-family: 'Arial', sans-serif;
    color: #333;
}

/* Header Styling */
.dashboard-header {
    text-align: center;
    margin-bottom: 30px;
}

.dashboard-header h1 {
    font-size: 2rem;
    color: #2c3e50;
}

.dashboard-header p {
    font-size: 1.1rem;
    color: #7f8c8d;
}

/* Grid Layout */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 15px;
}

/* Card Styling */
.card {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.summary-card {
    background: linear-gradient(135deg, #d4f4fa, #cfeff2);
}

.co2-card {
    background: linear-gradient(135deg, #e8f7d4, #e3f2cf);
}

/* Highlight Text */
.highlight {
    font-size: 1.8rem;
    font-weight: bold;
    color: #27ae60;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 0.9rem;
}

table th, table td {
    padding: 10px;
    border: 1px solid #e0e0e0;
}

table th {
    background-color: #3498db;
    color: #fff;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f7fd;
}

/* Progress Bar */
.progress-bar {
    width: 100%;
    height: 10px;
    background-color: #e0e0e0;
    border-radius: 5px;
    margin: 10px 0;
}

.progress {
    height: 100%;
    background-color: #3498db;
    border-radius: 5px;
}
</style>
