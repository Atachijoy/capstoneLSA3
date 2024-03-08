<template>
  <div class="container">
    <Bar
      id="my-chart-id"
      :options="chartOptions"
      :data="chartData"
    />
  </div>
</template>

<script>
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
import 'chartjs-plugin-datalabels';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
  name: 'BarChart',
  components: { Bar },
  data() {
    return {
      chartOptions: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
          datalabels: {
            formatter: (value) => {
              return value;
            },
            color: '#fff',
            anchor: 'end', // Ubicación del valor dentro de la barra
            align: 'end', // Alineación del valor dentro de la barra
          },
        },
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,
          },
        },
      }
    }
  },
  computed: {
    chartData() {
      return {
        labels: this.usuarios,
        datasets: [
          { 
            label: 'Analizados',
            data: this.variableHijo1,
            backgroundColor: 'rgba(54, 162, 235, 0.5)'
          },
          { 
            label: 'Pendiente',
            data: this.variableHijo2,
            backgroundColor: 'rgba(255, 99, 132, 0.5)'
          }
        ]
      };
    }
  },
  props: {
    variableHijo1: Array,
    variableHijo2: Array,
    usuarios: Array
  }

}
</script>

<style scoped>
 canvas{
  width:100%;
 }
</style>

Enviar mensaje a #documentos-y-recursos
