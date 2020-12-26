<?php
$url = 'exercise.develop.maximaster.ru/service/delivery/';

$options = array(
    'city' => $_POST['city'],
    'weight' => $_POST['weight']
);

$cURL = curl_init();
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cURL, CURLOPT_URL, $url.'?'.http_build_query($options));

$response = curl_exec($cURL);
$data = json_decode($response, true);
curl_close($cURL);

echo json_encode($data);