<?php

$url = 'exercise.develop.maximaster.ru/service/city/';

$cURL = curl_init();
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cURL, CURLOPT_URL, $url);

$response = curl_exec($cURL);
$data = json_decode($response, true);
curl_close($cURL);
