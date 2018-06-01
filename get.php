<?php
//*************************************************************
$latlng = $_GET['latlng'];

ini_set('max_execution_time', 600);
function curl_get($host, $referer = null){
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.9.168 Version/11.51");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_URL, $host);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $html = curl_exec($ch);
    echo curl_error($ch);
    curl_close($ch);
    return $html;
}

$str_uri = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latlng&key=AIzaSyBgVIObHG9w4w-ZsGeA2aHsiCheZRVA7m4";
$result = curl_get($str_uri);
//--------------------------------
$addr = json_decode($result);
$aad = $addr->results;
$aad1 = $aad[0];
$final = $aad1->formatted_address;
echo '<pre>';
print_r($final);
echo '</pre>';
?>
