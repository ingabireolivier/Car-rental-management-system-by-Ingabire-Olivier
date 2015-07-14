<?php
	function strip_zeros_from_date($marked_string="") {
		//first remove the marked zeros
		$no_zeros = str_replace('*0','',$marked_string);
		$cleaned_string = str_replace('*0','',$no_zeros);
		return $cleaned_string;
	}
	function redirect_to($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}
	function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}
		 
	}
	function output_message($message="") {
	
		if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
		}else{
			return "";
		}
	}
	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
					
	}
	function __autoload($class_name) {
		$class_name = strtolower($class_name);
		$path = LIB_PATH.DS."{$class_name}.php";
		if(file_exists($path)){
			require_once($path);
		}else{
			die("The file {$class_name}.php could not be found.");
		}
					
	}
	function file_path(){

		$pathinfo = pathinfo(__FILE__);
		echo $pathinfo['dirname'];
	}
	
	function currentpage(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[3];
	  
	}
	
	function unsetSessions(){
	if(isset($_SESSION['from'])){unset($_SESSION['from']);}
	if(isset($_SESSION['to'])){unset($_SESSION['to']);}
	if(isset($_SESSION['seats'])){unset($_SESSION['seats']);}
	if(isset($_SESSION['feature'])){unset($_SESSION['feature']);}
	if(isset($_SESSION['carid'])){unset($_SESSION['carid']);}
	}

	function dateDiff($start, $end) {

	$start_ts = strtotime($start);

	$end_ts = strtotime($end);

	$diff = $end_ts - $start_ts;

	return round($diff / 86400);

	}


?>