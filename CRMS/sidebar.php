<?php
if(isset($_POST['login'])){
	$email = $_POST['log_email'];
	$pass  = $_POST['log_pword'];
	
	 if ($email == '' OR $pass == '') {

         	message("Invalid Username and Password!", "error");
			redirect("index.php");
         
    } else {
	$renter = new renter();
	$res = $renter->renter_login($email, $pass);
		if($res == true){
			redirect("index.php");
		}else{

			message("Username or Password Not Registered! Contact Your administrator.","error");
			redirect("index.php");
		}
	}

}
?>

<!--Side bar-->
			<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="sidebar-nav">
		   <div class="panel panel-primary">
		   
			 <div class="panel-heading"><b>CARS AVAILABILITY CHECKER</b></div>
			  <div class="panel-body">	
						   <form  method="POST" action="#.php">
								<div class="col-xs-12 col-sm-12">

					            	<div class="form-group">
					            		<div class="row">
					            			<div class="col-xs-12 col-sm-12">
					            				<label class="control-label" for="from">Pick up Date</label>
						     
							                    <input class="form-control from" size="11" value="<?php echo (isset($_SESSION['from'])) ? $_SESSION['from'] : ''; ?>" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" type="text" value=""  name="from" id="from">
							                   
						              		</div>
						            	</div>
						            </div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
					            				<label class="control-label" for="to">Drop off Date</label>
						              			
								                    <input class="form-control to" size="11" type="text" value="<?php echo (isset($_SESSION['to'])) ? $_SESSION['to'] : ''; ?>"  name="to" id="to" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
								                   
						              		</div>
						            	</div>
						            </div>

						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						           				 <button type="submit" class="btn btn-primary" align="right"name="avail">Check Availability</button>
						           			 </div>
						            	</div>
						            </div>
						        </div>
					        </form>
						</div>
			
		</div>
			
				<div class="panel panel-primary">
					
					<?php if(!isset($_SESSION['renter_id'])){

				echo ' <div class="panel-heading">User Login</div>
					   <div class="panel-body">	
						   <form  method="POST" action="#.php">
								<div class="col-xs-12 col-sm-12">

					            	<div class="form-group">
					            		<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						              			<input type="email" placeholder="Email" class="form-control" name="log_email">
						              		</div>
						            	</div>
						            </div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						              			<input type="password" placeholder="Password" class="form-control" name="log_pword">
						              		</div>
						            	</div>
						            </div>

						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						           				 <button type="submit" class="btn btn-primary" align="right" name="login">Sign in</button>
						           			 </div>
						            	</div>
						            </div>
						        </div>
					        </form>
					       
						</div>';
					}else{

					echo'<div class="panel-heading">Renter Information</div>
							   <div class="panel-body">	
									<div class="col-xs-12 col-sm-12">
									 <span class="glyphicon glyphicon-user"> </span> Renter Name:<br/> <p><b>'.$_SESSION['name'].' '.$_SESSION['last'].'</b><br/>
									 <span class="glyphicon glyphicon-cog"> </span> Email:<br/> <b>'. $_SESSION['email'].'</b><br/>
									 		 <span class="glyphicon glyphicon-cog"> </span> Tel No.:<br/><b> '. $_SESSION['phone'].'</b><br/><br/>
									  <a href="logout.php" class="btn btn-default">Logout <span class="glyphicon glyphicon-log-out"></span></a>
									</div>					            					            		
								</div>';

					}
						?>
				</div>
				
				 <form name="clock">
			                  
					  <input  class="form-control" id="trans" type="label"  name="face" value="">
				</form>
						

		    <hr>
			

	

		
	</div>
			<!--/.well --> 
		</div>
		<!--/span-->
		<!--End of Side bar-->
