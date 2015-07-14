<!--Modal Log-out --> 

  <div class="modal fade" id="logout" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Are you Sure you Want to <strong>Logout</strong>?</div>
		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
		  </div>
		</div> 
    </div>
</div>      
                            
<!--Logout end -->       

<!--Modal Reservation --> 

  <div class="modal fade"  id="reservation" tabindex="-1">

	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Reservation Details</div>
		  <form  method="post" action="processreservation.php?action=delete">

<?php
//$mydb->setQuery("SELECT *,carName,firstname, lastname FROM reservation re,car ro,renter gu  WHERE re.carNo = ro.carNo AND re.renter_id=gu.renter_id");
/*$mydb->setQuery("SELECT * , carName, firstname, lastname
FROM reservation re, car ro, renter gu, cartype rt
WHERE re.carNo = ro.carNo
AND ro.`typeID` = rt.`typeID` 
AND re.renter_id = gu.renter_id AND reservation_id=".$_GET['res_id']);
$cur = $mydb->loadSingleResult();
*/				  			
//echo $resid;
 //echo $_GET['res_id'];


?>



</form>


		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
		  </div>
		</div> 
    </div>
</div>      
                            
<!--reseionrvat end -->   

</tbody>
</table>

</form>
