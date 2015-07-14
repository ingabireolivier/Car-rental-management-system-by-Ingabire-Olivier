<?php
require_once("../../includes/initialize.php");
 if (!isset($_SESSION['justadmin_ID'])){
 	redirect(WEB_ROOT ."admin/login.php");
 }
//checkAdmin();
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	default :
		$content    = 'list.php';		
}
  include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
