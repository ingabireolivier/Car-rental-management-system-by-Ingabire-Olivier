<?php
require_once("../includes/initialize.php");
 if (!isset($_SESSION['justadmin_ID'])){
 	redirect('login.php');
 }
 include '/modal.php'; 
$content='home.php';

include 'themes/backendTemplate.php';

?>
