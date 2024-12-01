<template>
  <div>
    <Bar ref="chart" :chart-data="chartData" :chart-options="chartOptions" />
  </div>
</template>

<script>

import { ref, watch, onMounted, nextTick } from 'vue';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js';

// Register necessary components
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
  name: 'CarbonChart',
  props: {
    carbonData: {
      type: Object,
      required: true
    }
  },
  setup(props) {
    const chartData = ref({
      labels: props.carbonData?.labels || [],
      datasets: props.carbonData?.datasets || []
    });

    const chartOptions = ref({
      responsive: true,
      plugins: {
        legend: {
          position: 'top'
        },
        tooltip: {
          callbacks: {
            label: (tooltipItem) => {
              return tooltipItem.raw + ' kg CO₂';
            }
          }
        }
      },
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    });

    const chartRef = ref(null); // Ref to the chart component

    // Watch for changes in the carbonData prop
    watch(
      () => props.carbonData,
      async (newData) => {
        if (newData && newData.labels && newData.datasets) {
          // Update chart data
          chartData.value = {
            labels: newData.labels,
            datasets: newData.datasets
          };

          // Force chart update after data change
          await nextTick();
          updateChart();
        }
      },
      { deep: true }
    );

    // Method to manually update the chart
    const updateChart = () => {
      const chartInstance = chartRef.value.chartInstance; // Access the chart instance
      if (chartInstance) {
        chartInstance.data = chartData.value; // Update chart data
        chartInstance.update(); // Trigger re-render of the chart
      }
    };

    // Log received props when mounted to ensure proper data binding
    onMounted(() => {
      console.log("Received carbonData in CarbonChart:", props.carbonData);
    });

    return {
      chartRef, // Expose the ref to the template
      chartData,
      chartOptions
    };
  }
};
</script>

<style scoped>
div {
  background-color: rgba(0, 0, 0, 0.1);
  border: 1px solid #ccc;
  padding: 20px;
  margin: 20px;
  width: 100%;
  height: 400px;
}
</style>
