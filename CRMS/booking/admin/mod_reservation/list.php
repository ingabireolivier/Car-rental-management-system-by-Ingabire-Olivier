
<div class="container">
<div class="panel panel-primary">
			<div class="panel-body">
			<h3 align="left">Booking Records</h3>
<form  method="post" action="processreservation.php?action=delete">
	<table id="example" class="table table-striped" cellspacing="0">
<thead>
<tr>
<td>No</td>	

<td width="90"><strong>Name</strong></td>
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td width="80"><strong>Confirmation</strong></td>
<td width="80"><strong>Pick up Date</strong></td>
<td width="70"><strong>Drop off Date</strong></td>
<td width="80"><strong>Model</strong></td>
<td width="80"><strong>Days</strong></td>
<td width="80"><strong>Total Price(RWF)</strong></td>
<td width="80"><strong>Status</strong></td>
<td width="100"><strong>Action</strong></td>
</tr>
</thead>
<tbody>
<?php
//$mydb->setQuery("SELECT *,carName,firstname, lastname FROM reservation re,car ro,renter gu  WHERE re.carNo = ro.carNo AND re.renter_id=gu.renter_id");
$mydb->setQuery("SELECT * , carName, firstname, lastname
FROM reservation re, car ro, renter gu, cartype rt
WHERE re.carNo = ro.carNo
AND ro.`typeID` = rt.`typeID` 
AND re.renter_id = gu.renter_id");
$cur = $mydb->loadResultList();
				  			
foreach ($cur as $result) {
?>
<tr>
<td width="5%" align="center"></td>
<td><?php echo $result->firstname." ".$result->lastname; ?></td>
<td><?php echo $result->confirmation; ?></td>
<td><?php echo $result->pickup; ?></td>
<td><?php echo $result->dropoff; ?></td>
<!--<td><?php echo $result->carName; ?></td>-->
<td><?php echo $result->carName; ?></td>
<td><?php echo dateDiff($result->pickup,$result->dropoff); ?></td>
<td><?php echo $result->payable; ?></td> 
<td><?php echo $result->status; ?></td> 
<!--<td><a class="btn btn-default toggle-modal-reserve" href="#reservationr<?php echo $result->reservation_id; ?>" role="button" >View</a></td>-->
<td >
	<?php 
		if($result->status == 'Confirmed'){ ?>
		<a class="cls_btn" id="<?php echo $result->reservation_id; ?>" data-toggle='modal' href="#profile" title="Click here to Change Image." >
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkin&id=<?php echo $result->reservation_id; ?>" class="btn btn-success btn-xs" ><i class="icon-edit">Pick up</a>
		<?php
		}elseif($result->status == 'Picked'){
	?>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkout&id=<?php echo $result->reservation_id; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Drop Off</a>
	<?php
		}else{
			?>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-success btn-xs" disabled="disabled"><i class="icon-edit">Pick up</a>
	<?php
		}

	?>
	
	
</td>

<?php }
?>
  
		<div class="modal fade" id="profile" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						

						<div class="alert alert-info">Profile:</div>
					</div>

					<form action="#"  method=
					"post">
						<div class="modal-body">
					
												
								<div id="display">
									
										<p>ID : <div id="infoid"></div></p><br/>
											Name : <div id="infoname"></div><br/>
											Email Address : <div id="Email"></div><br/>
											Gender : <div id="Gender"></div><br/>
											Birthday : <div id="bday"></div>
										</p>
										
								</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type=
							"button">Close</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</table>

</form>
</div>
</div>