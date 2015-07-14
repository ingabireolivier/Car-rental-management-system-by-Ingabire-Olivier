<?php
$pickup= '';
$dropoff= '';
if (isset($_SESSION['from'])){
$pickup = $_SESSION['from']; 
$dropoff = $_SESSION['to'];
}
if(isset($_POST['btnbook'])){

	if (!isset($_SESSION['from']) || !isset($_SESSION['to'])){
		message("Please Choose Pick up Date and Drop off date to continue reservation!", "error");
		redirect("index.php?page=5");
	}
		 if(isset($_POST['carid'])){
    	 $_SESSION['carid']=$_POST['carid'];
    	 redirect(WEB_ROOT. 'booking/');
   
	}
}
 /*if(!isset($_POST['seats'])){
    message("Choose from Seats!", "error");	
    redirect(".WEB_ROOT. 'booking/");
   	//exit;
 }*/
 /* if(isset($_POST['seats'])&&isset($_POST['feature'])){
    $_SESSION['carid']=$_POST['carid'];
	$_SESSION['seats'] = $_POST['seats'];
	$_SESSION['feature']  = $_POST['feature'];
   */
//	$_SESSION['carid']=$_POST['carid'];

    //exit;
   //} 
  //}

?>
<!--End of Header-->
<div class="container">
	<?php include'sidebar.php';?>

		<div class="col-xs-12 col-sm-9">
			<!--<div class="jumbotron">-->
				<div class="">
					<div class="panel panel-default">
						<div class="panel-body">	
							<fieldset>
								<p class="bg-warning">
							
									<?php 
									echo '<div class="alert alert-info" ><strong>From:'.$pickup. ' To: ' .$dropoff.'</strong>  </div>';
									?></p>
					

								<legend><h2 class="text-left">Cars and Rates</h2></legend>
								
								<?php 
				  		$mydb->setQuery("SELECT *,typeName FROM car ro, cartype rt WHERE ro.typeID = rt.typeID");
				  		$cur = $mydb->loadResultList();

				  			
						foreach ($cur as $result) {
							$mydb->setQuery("SELECT STATUS FROM reservation
												WHERE ((
												'$pickup' >= pickup
												AND  '$pickup' <= dropoff
												)
												OR (
												'$dropoff' >= pickup
												AND  '$dropoff' <= dropoff
												)
												OR (
												pickup >=  '$pickup'
												AND pickup <=  '$dropoff'
												)
												)
												AND carNo =".$result->carNo);

				  			$stats = $mydb->executeQuery();
				  			$rows = mysql_fetch_assoc($stats);

							$image = WEB_ROOT . 'admin/mod_car/'.$result->carImage;
						echo '<div style="float:left; width:370px; margin-left:10px;">';
							echo '<div style="float:left; width:70px; margin-bottom:10px;">';				
					  			echo '<img src="'.$image .'" width="180px" height="150px" style="-webkit-border-radius:5px; -moz-border-radius:5px;"title="<?php echo $carName; ?>"/>';
							echo '</div>';	
				
						echo '<div style="float:right; height:125px; width:180px; margin:0px; color:#000033;">';
						echo '<form name="book"  method="POST" action="'.WEB_ROOT.'index.php?page=5">';
						//'. $result->typeName.'<br/>'. $result->price.'<br/>'. $result->Seats.'<br/>
						echo '<input type="hidden" name="carid" value="'.$result->carNo.'"/>';
				  		echo '<p><strong>Car Model: '.$result->carName.'<br/> 
		  						<strong>Number of Seats: '.$result->Seats.',<br/>  Features: '.$result->Features.'<br/>
		  						<strong>Rate per Day: </strong> '. $result->price.' </p>';
		
	            			$status=$rows['STATUS'];
							if($status=='pending'){
							  	echo '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Comfirmation Pending!</strong></div><br>';
							}elseif($status=='Confirmed'){
								echo '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Booked!</strong></div><br>';
								}elseif($status=='Picked'){
								echo '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Being Used!</strong></div><br>';
							}else{
								echo '
								  	 <div class="form-group">
							            	<div class="row">
						            			<div class="col-xs-12 col-sm-12">
						            				<input type="submit" class="btn btn-primary btn-sm" name="btnbook" onclick="return validateBook();" value="Book Now!"/>
																           				     
							           			 </div>
							            	</div>
							            </div>';
							}
	            			
            			
				  		 echo '</form>';
				  		echo '</div>';
						echo '</div>';
				  	
					  	}
					   
					  	?>

				  	
								
							</fieldset>	
						</div>
					</div>	
					
				</div>
		<!--	</div>-->
		</div>
		<!--/span--> 
		<!--Sidebar-->

	</div>
	<!--/row-->
