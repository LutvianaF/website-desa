  const ctx = document.getElementById('myChartDetail').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($chartLabels) ?>,
      datasets: [
        {
          label: 'Laki-Laki',
          data: <?= json_encode($chartDataLaki) ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.6)',
        },
        {
          label: 'Perempuan',
          data: <?= json_encode($chartDataPerempuan) ?>,
          backgroundColor: 'rgba(255, 99, 132, 0.6)',
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
