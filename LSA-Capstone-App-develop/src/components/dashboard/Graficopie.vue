<template>
    <div class="container">
      <Pie
        id="my-chart-id"
        :options="chartOptions"
        :data="computedChartData"
      />
    </div>
  </template>

  <script>
  import { Pie } from 'vue-chartjs';
  import { Chart as ChartJS, Title, Tooltip, Legend, PieController, CategoryScale, ArcElement } from 'chart.js';

  ChartJS.register(ArcElement, Title, Tooltip, Legend, PieController, CategoryScale);

  export default {
    name: 'PieChart',
    components: { Pie },
    data() {
      return {
        chartOptions: {
          responsive: false,
          plugins:{
            tooltip:{
              callbacks: {
                label: function(context){
                  var label = context.label || '';
                  if(label){
                    label += ': ';
                  }
                  if(context.parsed){
                    label += context.parsed + ' Análisis';
                  }
                  return label;
                }
              }
            }
          },

        },
      };
    },
    computed: {
      computedChartData() {
        return {
          labels: this.usuarios, // Usa la prop usuarios en lugar de ['Red', 'Yellow', 'Green', 'Blue']
          datasets: [
            {
              data: this.variableHijo, // Usa la prop variableHijo en lugar de [25, 30, 15, 30]
              backgroundColor: ['red', 'yellow', 'green', 'blue'],
            },
          ],
        };
      },
    },
    props: {
      variableHijo: Array,
      usuarios: Array,
    },
  };
  </script>

<style scoped>
canvas{
 width:100%;
}
</style>