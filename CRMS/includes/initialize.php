<?php
/**
* Description:	This includes for basic and core configurations.
* Author:		Joken Villanueva
* Date Created:	october 27, 2013
* Revised By:		
*/

//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'CRMS');
defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'includes');

// load config file first 
require_once(LIB_PATH.DS."config.php");
//load basic functions next so that everything after can use them
require_once(LIB_PATH.DS."functions.php");
//later here where we are going to put our class session
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."member.php");
require_once(LIB_PATH.DS."pagination.php");
require_once(LIB_PATH.DS."paginsubject.php");
require_once(LIB_PATH.DS."cartype.php");
require_once(LIB_PATH.DS."renter.php");
require_once(LIB_PATH.DS."reserve.php");
//Load Core objects
require_once(LIB_PATH.DS."database.php");

//load database-related classes


?>