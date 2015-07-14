
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Roomtype();
$result = $rm->single_cartype($_SESSION['id']);

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover">
			<caption><h3 align="left">Cartype Details</h3></caption>

		<td width="30"><strong>Name </strong></td>
		<td><?php echo ': '.$result->typename; ?></td>
		</tr>
		<tr>
		<td width="30"><strong>Descrption </strong></td>
		<td><?php echo ': '.$result->Desp; ?></td>
		</tr>
		<tr>
		<td> <input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" ></td>
		</tr>
		</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
