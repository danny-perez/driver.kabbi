<?php
$all_dist = $_GET['all_dist'];
$min_dist = $_GET['minimum'];
$id = $_GET['id'];
$id_min = $_GET['id_min'];

if($all_dist<$min_dist){$resultat = $all_dist; $result_id = $id;} else {$resultat = $min_dist; $result_id = $id_min;}
$lll = array($result_id,$resultat);
$list = json_encode($lll);
echo $list;
?>
