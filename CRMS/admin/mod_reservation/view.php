<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$id=$_GET['id'];
$mydb->setQuery("SELECT *,carName,ro.seats,features,firstname,lastname,carImage,address FROM reservation re,car ro,renter gu  WHERE re.carNo = ro.carNo AND re.renter_id=gu.renter_id AND reservation_id=".$id);
$cur = $mydb->loadSingleResult();
$image = WEB_ROOT . 'admin/mod_car/'.$cur->carImage;	


?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Car Details</h3></caption>
			<tr>
				<td width="80"><img src="<?php echo $image; ?>" width="300" height="300" title="<?php echo $carName; ?>"/></td>
<td>
<p>
<strong>FIRSTNAME: </strong><?php echo $cur->firstname; ?><br/>

<strong>LAST NAME: </strong><?php echo $cur->lastname;?><br/>

 <strong>PHONE: </strong><?php echo $cur->phone;?><br/>

<strong>E-MAIL: </strong><?php echo $cur->email;?><br/>

<strong>CAR NAME: </strong><?php echo $cur->carName;?><br/>

<strong>SEATS: </strong><?php echo $cur->seats;?><br/>

<strong>FEATURES: </strong><?php echo $cur->features;?><br/>

<strong>DAY RATE(RWF): </strong><?php echo $cur->price;?><br/>

<strong>Pickup: </strong><?php echo $cur->pickup;?><br/>

<strong>Dropoff: </strong><?php echo $cur->dropoff; ?><br/>

<strong>Total Price(RWF): </strong><?php echo $cur->payable;?><br/><br/>
<b><h4>Status: </h4></b><h4><i><?php echo $cur->status;?></i></h4>
</p>
<?php 
	$stat = $cur->status;
	if($stat == 'pending'){?>
		 <a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
		  <a href="controller.php?action=confirm&res_id=<?php echo $cur->reservation_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>  Confirm</a>
		  <a href="controller.php?action=cancel&res_id=<?php echo $cur->reservation_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus-sign"></span>  Cancel</a>
<?php 
	}elseif($stat == 'Confirmed'){
?>
	<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
	    <a href="controller.php?action=cancel&res_id=<?php echo $cur->reservation_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus-sign"></span>  Cancel</a>
	  
<?php
}else{
	?>

<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
<?php
}

?>
 
</td>
</tr>




			</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
