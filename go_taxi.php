<?php
$sname = $_GET['name'];

$lat_start = $_GET['lat'];
$lng_start = $_GET['lng'];

$lat_finish = $_GET['lat1'];
$lng_finish = $_GET['lng1'];

$lat1_start = $_GET['lat2'];
$lng1_start = $_GET['lng2'];

$lat1_finish = $_GET['lat3'];
$lng1_finish = $_GET['lng3'];

$link = mysqli_connect("localhost", "root2", "E200847") or die('Connect error');
mysqli_query($link,"SET NAMES 'utf8'"); 
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
$sel_db=mysqli_select_db($link, 'k_taxinew') or die('Cannot choose base');

$query="SELECT MAX(`id`) FROM `coords`";
$result = mysqli_query($link, $query) or die('SQL error');
$row = mysqli_fetch_row($result);
$max_id = $row[0];

$query="SELECT `name` FROM `coords` WHERE `id` LIKE '$max_id'";
$result = mysqli_query($link, $query) or die('SQL error');
$row = mysqli_fetch_assoc($result);
$fname = $row['name'];

$sql = "INSERT INTO `driver`(`id`, `fname`, `lat_start`, `lng_start`, `lat_finish`, `lng_finish`, `sname`, `lat1_start`, `lng1_start`, `lat1_finish`, `lng1_finish`) VALUES (null,'$fname','$lat_start','$lng_start','$lat_finish','$lng_finish','$sname','$lat1_start','$lng1_start','$lat1_finish','$lng1_finish')";
mysqli_query($link, $sql) or die('SQL error');
echo "Successfull complit";
?>
