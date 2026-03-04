<?php

use App\Weather\FakeWeatherFetcher;
use App\Weather\RandomWeatherFetcher;
use App\Weather\RemoteWeatherFetcher;

require __DIR__ . '/inc/all.inc.php';

// http://api.weatherapi.com/v1/current.json?key=d2744d8c6afe44b3a35123333262702&q=London&aqi=no

$city = $_GET['city'];

// $url = "http://api.weatherapi.com/v1/current.json?key=d2744d8c6afe44b3a35123333262702&q=London&aqi=no";

// $json = file_get_contents($url);
// $data = json_decode($json, true);

// var_dump($data);

// $city = $_GET['city'] ?? 'London';
// $url = "https://api.weatherapi.com/v1/current.json?key=d2744d8c6afe44b3a35123333262702&q=" . urlencode($city);

// $cacheDir = __DIR__ . "/cache/";
// $cacheFile = $cacheDir . md5($city) . ".json";
// $cacheTime = 600; // 10 минут

// if (!is_dir($cacheDir)) {
//     mkdir($cacheDir);
// }

// if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
//     $json = file_get_contents($cacheFile);
// } else {
//     $json = file_get_contents($url);
//     file_put_contents($cacheFile, $json);
// }

// $data = json_decode($json, true);

// $url = "http://api.weatherapi.com/v1/current.json?key=d2744d8c6afe44b3a35123333262702&q=London&aqi=no";
// $cacheFile = __DIR__ . "/cache_london.json";
// $cacheTime = 600; // 10 минут (в секундах)

// // Если файл существует и не устарел — используем кеш
// if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
//     $json = file_get_contents($cacheFile);
// } else {
//     // Иначе делаем запрос к API
//     $json = file_get_contents($url);
    
//     // Сохраняем в кеш
//     file_put_contents($cacheFile, $json);
// }

// // Преобразуем JSON в массив
// $data = json_decode($json, true);

// print_r($data);



$fp = @fsockopen("ssl://api.weatherapi.com", 443, $errno, $errstr, 30);

if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET /v1/current.json?key=d2744d8c6afe44b3a35123333262702&q=" . $city . "&aqi=no HTTP/1.1\r\n";
    $out .= "Host: api.weatherapi.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    // ?" . http_build_query(['city' => $city]) . "
    fwrite($fp, $out);
    $result = [];
    while (!feof($fp)) {
        $result[] = fgets($fp, 128);
    }
    fclose($fp);
    $stringImplode = implode($result);
    $splittedString = preg_match('/\{.*\}/s', $stringImplode, $matches);
    $data = json_decode($matches[0], true);

    $dataCity = $data['location']['name'];
    $dataTemp = $data['current']['temp_c'];
    $dataWeather = $data['current']['condition']['text'];

    // var_dump($dataWeather);

    if (preg_match('/\b(cloudy|snowy|stormy|sunny|light drizzle|light rain shower|clear|overcast)\b/i', $dataWeather, $matches)) {
        $weather = strtolower($matches[1]);
    } else {
        echo "No match";
    }

    // var_dump($dataCity);
    // var_dump($dataTemp);
    // var_dump($weather);
    }

$fetcher = new RemoteWeatherFetcher();
$info = $fetcher->fetch($dataCity, $dataTemp, $weather);

require __DIR__ . '/views/index.view.php';


