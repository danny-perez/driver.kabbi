<?php
$link = mysqli_connect("localhost", "root2", "E200847") or die('Connect error');
mysqli_query($link,"SET NAMES 'utf8'"); 
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
$sel_db=mysqli_select_db($link, 'k_taxinew') or die('Cannot choose base');

$query="SELECT * FROM `driver` ";
$result = mysqli_query($link, $query) or die('SQL error');
while($row = mysqli_fetch_assoc($result)){
                                        $kk[] = $row;
                                        }
foreach($kk as $coord)
{
    $fname = $coord['fname'];
    $latlng_start = $coord['lat_start'].','.$coord['lng_start'];
    $faddr_start = get_addr($latlng_start);
    
    $latlng_finish = $coord['lat_finish'].','.$coord['lng_finish'];
    $faddr_finish = get_addr($latlng_finish);
    
    $distance_first = get_distance($latlng_start,$latlng_finish);
    $df = $distance_first->routes;
    $df0 = $df[0];
    $dfl = $df0->legs;
    $dfl0 = $dfl[0];
    $dfl0d = $dfl0->distance;
    $dtime = $dfl0->duration;
    $first_time = $dtime->text;
    $dftext = $dfl0d->text;
    $distance_first = $dftext;
    /*****************************************************************/
    
    $sname = $coord['sname'];
    $latlng1_start = $coord['lat1_start'].','.$coord['lng1_start'];
    $saddr_start = get_addr($latlng1_start);
    
    $latlng1_finish = $coord['lat1_finish'].','.$coord['lng1_finish'];
    $saddr_finish = get_addr($latlng1_finish);
    
    $distance_second = get_distance($latlng1_start,$latlng1_finish);
    $df = $distance_second->routes;
    $df0 = $df[0];
    $dfl = $df0->legs;
    $dfl0 = $dfl[0];
    $dfl0d = $dfl0->distance;
    $dtime = $dfl0->duration;
    $second_time = $dtime->text;
    $dftext = $dfl0d->text;
    $distance_second = $dftext;
    /*****************************************************************/
    
    $all_distance = get_all_distance($latlng_start,$latlng_finish,$latlng1_start,$latlng1_finish);
    $df = $all_distance->routes;
    if(count($df)==0){$all_distance = 'You cannot create a route. Sorry.';$all_time='Not';}
    else {
    $df0 = $df[0];
    $dfl = $df0->legs;
    $dfl0 = $dfl[0];
    $dfl0d = $dfl0->distance;
    $dtime = $dfl0->duration;
    $all_time = $dtime->text;
    $dftext = $dfl0d->text;
    $all_distance = $dftext;
    }
    /******************************************************************/
    
    $mass_addr['fname']=$fname;
    $mass_addr['fstart']=$faddr_start;
    $mass_addr['ffinish']=$faddr_finish;
    $mass_addr['first_distance']=$distance_first;
    $mass_addr['first_time']=$first_time;
    
    $mass_addr['sname']=$sname;
    $mass_addr['sstart']=$saddr_start;
    $mass_addr['sfinish']=$saddr_finish;
    $mass_addr['second_distance']=$distance_second;
    $mass_addr['second_time']=$second_time;
    
    //$mass_addr['all_distance']=$distance_all;
    $mass_addr['all_distance']=$all_distance;
    $mass_addr['all_time']=$all_time;
    
    $res_addr[]=$mass_addr;
}






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
function get_addr($latlng)
{
    ini_set('max_execution_time', 600);
    $str_uri = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latlng&key=AIzaSyBgVIObHG9w4w-ZsGeA2aHsiCheZRVA7m4";
    $result = curl_get($str_uri);
    //--------------------------------
    $addr = json_decode($result);
    $aad = $addr->results;
    $aad1 = $aad[0];
    $final = $aad1->formatted_address;
    return $final;
}
function get_distance($latlng_start,$latlng_finish)
{
    ini_set('max_execution_time', 600);
    $str_uri = "https://maps.googleapis.com/maps/api/directions/json?origin=$latlng_start&destination=$latlng_finish&key=AIzaSyBgVIObHG9w4w-ZsGeA2aHsiCheZRVA7m4";
    $result = curl_get($str_uri);
    //--------------------------------
    $addr = json_decode($result);
    return $addr;
}
function get_all_distance($latlng_start,$latlng_finish,$latlng1_start,$latlng1_finish)
{
    ini_set('max_execution_time', 600);
    $str_uri = "https://maps.googleapis.com/maps/api/directions/json?origin=$latlng_start&destination=$latlng_finish&waypoints=via:$latlng1_start|via:$latlng1_finish&key=AIzaSyBgVIObHG9w4w-ZsGeA2aHsiCheZRVA7m4";
    $result = curl_get($str_uri);
    //--------------------------------
    $addr = json_decode($result);
    return $addr;
}
?>
