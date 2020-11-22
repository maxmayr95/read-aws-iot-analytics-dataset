<?php
/*$directory = 'json';

if (!is_dir($directory)) {
    exit('Invalid diretory path');
}

$files = array();
foreach (scandir($directory) as $file) {
    if ($file !== '.' && $file !== '..') {
        $files[] = $file;
    }
}
$count = 0;
$result = array();
for ($value = end($files); ($key = key($files)) !== null; $value = prev($files)) {
  $string = file_get_contents("json/".$value);
  $json = json_decode($string, true);
  $result[$count]["temperature"] = $json["state"]["reported"]["temperature"];
  $exploded = explode(".",$value);

  //$result[$count]["time_meta"] = date('m/d/Y H:s',$exploded[0]);
  $result[$count]["time_meta"] = $json['metadata']["reported"]["temperature"]['timestamp'];
  //$result[$count]["time"] = date('m/d/Y H:s',$json['metadata']["reported"]["temperature"]['timestamp']);
  $result[$count]["time"] = date('m/d/Y H:s',$exploded[0]);
  $result[$count]["file"] = $value;
  $count++;
}
echo json_encode($result);*/
require 'analytics.php';
$iotAnalytics = new IoTAnalyticsHandler();
$dataSet = $iotAnalytics->getDatasetContent("analytics_dataset");
$csvUri = $dataSet["entries"][0]["dataURI"];
$json = csvToJson($csvUri);
echo $json;
function csvToJson($fname) {
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }
    $key = fgetcsv($fp,"1024",",");
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }
    fclose($fp);
    return json_encode($json);
}
?>
