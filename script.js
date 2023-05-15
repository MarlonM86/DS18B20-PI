var chart; // Globale Variable f r das Diagramm

function updateTemperature() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.responseText);
      document.getElementById("current-temperature").innerHTML = response.currentTemperature;

      var temperatureData = "";
      var temperatureArray = response.temperatureArray;
      for (var i = temperatureArray.length - 1; i >= 0; i--) {
        var timestamp = temperatureArray[i].timestamp;
        var temperature = temperatureArray[i].temperature;
        temperatureData += "<tr><td>" + timestamp + "</td><td>" + temperature + "&deg;C</td></tr>";
      }
      document.getElementById("temperature-data").innerHTML = temperatureData;

      updateTemperatureChart(temperatureArray);
    }
  };
  xhttp.open("GET", "temperature.php", true);
  xhttp.send();
}

function updateTemperatureChart(temperatureArray) {
  var timestamps = [];
  var temperatures = [];

  // Filtere die Daten auf die letzten 2 Stunden
  var now = new Date();
  var twoHoursAgo = now.getTime() - (2 * 60 * 60 * 1000);

  for (var i = 0; i < temperatureArray.length; i++) {
    var timestamp = new Date(temperatureArray[i].timestamp).getTime();
    if (timestamp >= twoHoursAgo) {
      timestamps.push(temperatureArray[i].timestamp);
      temperatures.push(temperatureArray[i].temperature);
    }
  }
  if (chart) {
    // Aktualisiere das vorhandene Diagramm mit neuen Daten
    chart.data.labels = timestamps;
    chart.data.datasets[0].data = temperatures;
    chart.update();
  } else {
    // Erstelle ein neues Diagramm
    var ctx = document.getElementById("temperature-chart").getContext("2d");
    chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: timestamps,
        datasets: [{
          label: 'Temperatur',
          data: temperatures,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Zeitstempel'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Temperatur (C)'
            }
          }
        }
      }
    });
  }
}

// Aktualisiere die Temperatur, die letzten Werte und das Diagramm alle 10 Sekunden
setInterval(updateTemperature, 10000);

// Rufe die updateTemperature-Funktion beim Laden der Seite auf
window.addEventListener("load", updateTemperature);
