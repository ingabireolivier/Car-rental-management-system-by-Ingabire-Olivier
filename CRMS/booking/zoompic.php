<?php
require_once '../config/config.php';
if(isset($_GET['id'])){	
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM car WHERE carNo = $id");

while($row = mysql_fetch_array($result))
extract($row);
  {
         if ($carImage) {
			$image = WEB_ROOT . 'admin/car/' . $carImage;
                }
                        else {
			$image = WEB_ROOT . 'admin/car/no-image-small.png';
		}
  echo "<img width=300 height=300 alt='Unable to View' src='" .$image."'>";
  }
}
?>
			
