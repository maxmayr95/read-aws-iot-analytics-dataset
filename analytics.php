<?php

define('AWS_IOT_CREDENTIALS_KEY','AKIAQIO732VQA6PNAR4L');
define('AWS_IOT_CREDENTIALS_SECRET','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');
require 'vendor/autoload.php';

class IoTAnalyticsHandler {
  private $client;
  function __construct() {
    $this->client = $this->getClient();
  }
  private function getClient(){
    return $client = new Aws\IoTAnalytics\IoTAnalyticsClient([
        'version' => 'latest',
        'region'  => 'us-west-2',
        'credentials' => [
            'key'    => AWS_IOT_CREDENTIALS_KEY,
            'secret' => AWS_IOT_CREDENTIALS_SECRET,
        ],
    ]);
  }
  function getDatasetContent($datasetname){
    $result = $this->client->getDatasetContent([
        'datasetName' => $datasetname
    ]);
    return $result;
  }
}
?>
