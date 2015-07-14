<?php 
require_once '../../config/config.php';
require_once '../../functions/functions.php';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'add' :
	dbINSERT();
	break;
	
	case 'modify' :
	dbMODIFY();
	break;
	
	case 'delete' :
	dbDELETE();
	break;
	}
function dbINSERT(){
$name=$_POST["name"];
$id=$_POST["typeID"];
$price=$_POST["price"];
$renter=$_POST["renter"];
$seats=$_POST["seats"];
$featureren=$_POST["featureren"];
$img=$_FILES["image"];

$image = uploadImage('image', SRV_ROOT . 'images/cars/');

$sql = "INSERT INTO car(carName,typeID,price,Seats,Features,carImage) VALUES('$name','$id','$price','$seats','$featureren','$image')";
$result=dbQuery($sql);// or die
if(!$result)
{
   //echo $message; 
  die('Could not enter data: ' . mysql_error());
} else {

header('Location:index.php');
}
}
function dbMODIFY(){
$id = $_GET['id'];
$name=$_POST['name'];
$typeid=$_POST['typeID'];
$price=$_POST['price'];
$renter=$_POST['renter'];
$sql="UPDATE car SET carName='$name', typeID='$typeid',price='$price',maxrenterNo='$renter' WHERE carNo={$id}";
$result = dbQuery($sql);
if(!$result)
{
  die('Could not enter data: ' . mysql_error());
} else {

header('Location:index.php');}
}

function dbDELETE(){
$delete = (isset($_POST['delete']) && $_POST['delete'] != '') ? $_POST['delete'] : '';
$checkbox = (isset($_POST['checkbox']) && $_POST['checkbox'] != '') ? $_POST['checkbox'] : '';
$ct = count($checkbox);
	if($delete && $checkbox){
		for($i=0;$i<$ct;$i++){
			
			$del_id = $checkbox[$i];
			_deleteImage($del_id);
				$sql = "DELETE FROM car WHERE carNo={$del_id}";
							

		$result = dbQuery($sql)or die('Could not delete record: ' . mysql_error());
		
 
header('Location:index.php');
		}
	}
else{
header('Location:index.php');	
	}
}
function uploadImage($inputName, $uploadDir)
{
    $image     = $_FILES[$inputName];
    $imagePath = '';
    
    // if a file is given
    if (trim($image['tmp_name']) != '') {
        // get the image extension
        $ext = substr(strrchr($image['name'], "."), 1); 

        // generate a random new file name to avoid name conflict
        $imagePath = md5(rand() * time()) . ".$ext";
        
		// check the image width. if it exceed the maximum
		// width we must resize it
		$size = getimagesize($image['tmp_name']);
		
		if ($size[0] > MAX_CATEGORY_IMAGE_WIDTH) {
			$imagePath = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_CATEGORY_IMAGE_WIDTH);
		} else {
			// move the image to category image directory
			// if fail set $imagePath to empty string
			if (!move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath)) {
				$imagePath = '';
			}
		}	
    }

    
    return $imagePath;
}
function createThumbnail($srcFile, $destFile, $width, $quality = 75)
{
	$thumbnail = '';
	
	if (file_exists($srcFile)  && isset($destFile))
	{
		$size        = getimagesize($srcFile);
		$w           = number_format($width, 0, ',', '');
		$h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');
		
		$thumbnail =  copyImage($srcFile, $destFile, $w, $h, $quality);
	}
	
	// return the thumbnail file name on sucess or blank on fail
	return basename($thumbnail);
}
function copyImage($srcFile, $destFile, $w, $h, $quality = 75)
{
    $tmpSrc     = pathinfo(strtolower($srcFile));
    $tmpDest    = pathinfo(strtolower($destFile));
    $size       = getimagesize($srcFile);

    if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg")
    {
       $destFile  = substr_replace($destFile, 'jpg', -3);
       $dest      = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } elseif ($tmpDest['extension'] == "png") {
       $dest = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } else {
      return false;
    }

    switch($size[2])
    {
       case 1:       //GIF
           $src = imagecreatefromgif($srcFile);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($srcFile);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($srcFile);
           break;
       default:
           return false;
           break;
    }

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

    switch($size[2])
    {
       case 1:
       case 2:
           imagejpeg($dest,$destFile, $quality);
           break;
       case 3:
           imagepng($dest,$destFile);
    }
    return $destFile;

}
function _deleteImage($catId)
{
    // we will return the status
    // whether the image deleted successfully
    $deleted = false;

	// get the image(s)
    $sql1 = "SELECT * 
            FROM car
            WHERE carNo ";
	
	if (is_array($catId)) {
		$sql1 .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql1 .= " = {$catId}";
	}	

    $result = dbQuery($sql1);
    
    if (dbNumRows($result1)) {
        while ($row1 = dbFetchAssoc($result)) {
		extract($row1);
	        // delete the image file
    	    $deleted = @unlink(SRV_ROOT .'images/cars'. $carImage);
		}	
    }
    
return $deleted;
}
?>
