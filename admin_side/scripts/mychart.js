const ctx = document.getElementById('myChart');
const col = 'rgb(5, 70, 108)';
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'Sales',
        data: [12, 19, 3, 5, 2, 3, 6],
        borderWidth: 1,
        backgroundColor: col,
        Fill: true,
        borderColor: col
      }]
    },
    options: {
      Responsive : true,
    }
  });