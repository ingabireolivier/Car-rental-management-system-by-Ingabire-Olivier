<?php
require_once("../../includes/initialize.php");
 if (!isset($_SESSION['justadmin_ID'])){
 	redirect(WEB_ROOT ."admin/login.php");
 }
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
	case 'search' :
		$content    = 'search.php';		
		break;
	case 'list' :
		$content    = 'list.php';		
		break;	
			
	default :
		$content    = 'search.php';		
}
  include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
