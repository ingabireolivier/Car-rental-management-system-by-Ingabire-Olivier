<?php
require_once("../includes/initialize.php");
$menus=array("Home Page"=>"home.php","About Us"=>"about.php","Booking"=>"booking.php","Admin"=>"services.php","Latest News"=>"latest.php","contacts"=>"contact.php");
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'booking' :
	    $title="Booking";
		$content    = 'booking.php';		
		break;

	case 'info' :
	    $title="Booking";
		$content    = 'personalinfo.php';		
		break;

	case 'payment':
	    $title="Booking";
   		$content    = 'payment.php';		
		break;

	case 'detail' :
	    $title="Booking";
		$content    = 'reservation.php';
		break;
	case 'mpesa' :
	    $title="Booking";
		$content    = 'detail.php';
		break;
	
	default :
	    $title="Booking";
		$content    = 'booking.php';		
}
include '../theme/template.php';
?>
  
