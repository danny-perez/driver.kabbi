<?php
$id = $_GET['id'];
$link = mysqli_connect("localhost", "root2", "E200847") or die('Connect error');
mysqli_query($link,"SET NAMES 'utf8'"); 
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
$sel_db=mysqli_select_db($link, 'k_taxinew') or die('Cannot choose base');

$query="SELECT * FROM `coords` WHERE `id`=$id";
$result = mysqli_query($link, $query) or die('SQL error');
$row = mysqli_fetch_assoc($result);
$request = json_encode($row);
echo $request;
?>
