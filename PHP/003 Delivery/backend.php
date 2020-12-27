<?php

$url = 'exercise.develop.maximaster.ru/service/city/';

$cache = 'cache.json';
$default = 'Москва';

if (file_exists($cache) && date("d.m.Y") === date("d.m.Y", filectime($cache))) {
    // Файл $cache в последний раз был изменен сегодня! Не обращаемся к серверу!
    $data = file_get_contents($cache);
    $data = json_decode($data, true);
    for ($i = 0; $i < count($data); $i++ ) {
        if ($data[$i] === $default) {
            unset($data[$i]);
            array_unshift($data, $default);
        }
    }
} else {
    // "Файл $cache в последний раз был изменен НЕ сегодня! Обращаемся к серверу!
    $cURL = curl_init();
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cURL, CURLOPT_URL, $url);

    $response = curl_exec($cURL);
    $data = $response;
    curl_close($cURL);
    file_put_contents($cache, $data);
    header("Refresh:0");
}


