<?php

namespace app\commands;

use yii\console\Controller;
use korkiss\taxi\GetTaxiServiceGet;
use korkiss\taxi\GetTaxiWsdlClass;
use korkiss\taxi\GetTaxiStructGetTaxiInfos;
use korkiss\taxi\GetTaxiStructGetTaxiInfosRequest;
use korkiss\taxi\GetTaxiStructGetTaxiInfosResponse;

class CronController extends Controller
{

  private $regNumber = 'ем33377';

  /**
   * Create OK situation
   */
  public function actionEm33377()
  {
    $this->regNumber = 'ем33377';
    $this->actionParseTaxi();
  }
  
  /**
   * Create FAIL situation
   */
  public function actionEm33378()
  {
    $this->regNumber = 'ем33378';
    $this->actionParseTaxi();
  }

  /**
   * Необходимо реализовать web-приложение, которое по крону будет выполнять 
   * тестовый запрос к wsdl сервису, сравнивать его ответ с эталоном и сохранять 
   * результат сравнения, временем реакции (время выполнения запроса) и 
   * вердиктом (OK|FAIL) в базу.
   */
  private function actionParseTaxi()
  {
    $getTaxiServiceGet = new GetTaxiServiceGet();

    $infoRequest = new GetTaxiStructGetTaxiInfosRequest();

    // Хардкодим и не заморачиваемся
    $infoRequest->RegNum = $this->regNumber;

    // Выполняем SOAP запрос
    $startTime = time();
    $soapResult = $getTaxiServiceGet->GetTaxiInfos(new GetTaxiStructGetTaxiInfos($infoRequest));
    $endTime = time();
    $responseTime = $endTime - $startTime;


    $cronModel = new \app\models\CronResults();
    $cronModel->delay = $responseTime;
    $cronModel->date_request = date("Y-m-d H:i:s", $startTime);
    $cronModel->date_response = date("Y-m-d H:i:s", $endTime);


    if ($soapResult) {
      $obj = $getTaxiServiceGet->getResult();

      // JSON с правильным объектом
      $objTest = unserialize(file_get_contents("test.json"));

      // Сравниваем с эталоном
      if ($obj == $objTest) {
        echo "OK";
        $cronModel->result = true;
      } else {
        echo "FAIL";
        $cronModel->result = false;

        $soapResponseContent = $getTaxiServiceGet->getLastResponse();
        $soapResponseHeaders = $getTaxiServiceGet->getLastResponseHeaders();

        // Кроме того, необходимо сохранять тело ответа сервиса (и по желанию, хедеры) 
        // в случае, если сравнение выдало FAIL. Желательно ограничить размер сохраняемых 
        // данных, во избежание переполнения базы (15 КБ на ответ, 3 КБ на хедеры).
        $cronModel->body = substr($soapResponseContent, 0, 15000);
        $cronModel->headers = substr($soapResponseHeaders, 0, 3000);
      }
    } else {
      print_r($getTaxiServiceGet->getLastError());
    }

    $cronModel->save();
  }

}
