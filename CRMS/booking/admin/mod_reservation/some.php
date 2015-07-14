<?php 
require_once("includes/initialize.php");	

$reservation_id = $_POST['id'];

$mydb->setQuery("SELECT * 
FROM reservation WHERE reservation_id =".$reservation_id );
$cur = $mydb->loadResultList();

die(json_encode($cur));
?>