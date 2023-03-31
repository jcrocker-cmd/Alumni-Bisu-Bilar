

const data = {
    labels: day_labels,
    datasets: [{
      label: 'Daily Reissueance/s',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: day_data, // Note: use the {!! !!} syntax to output the data as-is
    }]
  };
  
  const config_line = {
    type: 'line',
    data: data,
    options: {
      animations: {
        tension: {
          duration: 1000,
          easing: 'linear',
          from: 1,
          to: 0,
          loop: true
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      },
      title: {
        display: true,
        text: 'Monthly Reissueance/s'
      },
      // Set the chart width and height here
      width: 800,
      height: 400
    }
  };
  
  
  const config_bar = {
    type: 'bar',
    data: data,
    options: {
      animations: {
        tension: {
          duration: 1000,
          easing: 'linear',
          from: 1,
          to: 0,
          loop: true
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      },
      title: {
        display: true,
        text: 'Monthly Reissueance/s'
      },
    }
  };
  
  
  let myChart = new Chart(
    document.getElementById('reissuance_Chart'),
    config_bar
  );
  
  document.getElementById('display-selector').addEventListener('change', function() {
    var displayType = this.value;
    var labels, data, title, datasetLabel;
    
    if (displayType === 'day') {
      labels = day_labels;
      data = day_data;
      title = 'Daily Reissueance/s';
      datasetLabel = 'Daily Reissueance/s';
    } else if (displayType === 'week') {
      labels = week_labels;
      data = week_data;
      title = 'Weekly Reissueance/s';
      datasetLabel = 'Weekly Reissueance/s';
    } else if (displayType === 'month') {
      labels = month_labels;
      data = month_data;
      title = 'Monthly Reissueance/s';
      datasetLabel = 'Monthly Reissueance/s';
    } else if (displayType === 'year') {
      labels = year_labels;
      data = year_data;
      title = 'Yearly Reissueance/s';
      datasetLabel = 'Yearly Reissueance/s';
    }
    
    myChart.data.labels = labels;
    myChart.data.datasets[0].label = datasetLabel;
    myChart.data.datasets[0].data = data;
    myChart.options.title.text = title;
  
    myChart.update();
  });
  
  function chartType(type){
    myChart.destroy();
    if (type === 'bar') {
        myChart = new Chart(
        document.getElementById('reissuance_Chart'),
        config_bar
      );
    }
  
    if (type === 'line') {
      myChart = new Chart(
      document.getElementById('reissuance_Chart'),
      config_line
    );
  }
  }
  
  