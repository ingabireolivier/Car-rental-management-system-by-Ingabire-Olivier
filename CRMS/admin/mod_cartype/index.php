<?php
require_once("../../includes/initialize.php");
 if (!isset($_SESSION['justadmin_ID'])){
 	redirect(WEB_ROOT ."admin/login.php");
 }
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

/*$thisFile = str_replace('\\', '/', __FILE__);
$docRoot =$_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'config/config.php'), '', $thisFile);
$srvRoot  = str_replace('config/config.php','', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);
//define('ADMIN_INDEX_PATH', dirname(__FILE__));
define('ADMIN_INDEX_PATH', $_SERVER['SERVER_NAME']);
define( 'SEP', DIRECTORY_SEPARATOR );
ECHO WEB_ROOT;
//require_once (WEB_ROOT.'backendTemplate.php');*/
  include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
