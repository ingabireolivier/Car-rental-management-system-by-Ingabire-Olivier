

<?php

$_SESSION['id']=$_GET['id'];
$mydb->setQuery("SELECT *,typeName FROM car rm, cartype rt WHERE rm.typeID = rt.typeID and carNo=".$_SESSION['id']);
$cur = $mydb->loadSingleResult();

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Car Details</h3></caption>
		<tr>
		<td width="80"><img src="<?php echo $cur->carImage; ?>" width="300" height="300" title="<?php echo $carName; ?>"/></td>
		<td align="left" align="left"><p><strong>Type </strong>
		<?php echo ': '.$cur->typename; ?><br/>
		<strong>Model </strong>
		<?php echo ': '.$cur->carName; ?><br/>
		<strong>Price/Rate </strong>
		<?php echo ': '.$cur->price; ?><br/>
		<strong>Seats </strong>
		<?php echo ': '.$cur->Seats; ?><br/>
		<strong>Features </strong>
		<?php echo ': '.$cur->Features; ?><br/><br/>
		<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >

	</p>
		
		
				</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
