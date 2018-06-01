<?php
$name = $_REQUEST['name'];
$lat_start = $_REQUEST['lat_start'];
$lng_start = $_REQUEST['lng_start'];
$lat_finish = $_REQUEST['lat_finish'];
$lng_finish = $_REQUEST['lng_finish'];
$link = mysqli_connect("localhost", "root2", "E200847") or die('Connect error');
mysqli_query($link,"SET NAMES 'utf8'"); 
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
$sel_db=mysqli_select_db($link, 'k_taxinew') or die('Cannot choose base');

$query="INSERT INTO `coords`(`id`, `name`, `lat_start`, `lng_start`,`lat_finish`, `lng_finish`) VALUES (null,'$name','$lat_start','$lng_start','$lat_finish','$lng_finish')";
mysqli_query($link, $query) or die('SQL error');
mysqli_close($link);
?>
