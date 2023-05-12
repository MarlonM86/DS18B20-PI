<?php
$filename = 'temperature.csv';

if (file_exists($filename)) {
  $content = file_get_contents($filename);
  $rows = explode("\n", $content);

  $temperatureArray = [];
  $rowCount = 0;
  foreach ($rows as $row) {
    $data = str_getcsv($row);
    if ($data && count($data) >= 2) {
      $timestamp = $data[0];
      $temperature = $data[1];
      $temperatureArray[] = ["timestamp" => $timestamp, "temperature" => $temperature];
      $rowCount++;

      if ($rowCount >= 15) {
        array_shift($temperatureArray); // Entferne den ältesten Wert, um die Anzahl bei 15 zu halten
      }
    }
  }

  $currentTemperature = end($temperatureArray)["temperature"];

  $response = [
    "currentTemperature" => $currentTemperature,
    "temperatureArray" => $temperatureArray
  ];

  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  echo "Datei nicht gefunden";
}
?>
