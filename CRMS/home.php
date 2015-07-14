
<div class="container">
	<?php include'sidebar.php';?>

		<div class="col-xs-12 col-sm-9">
			<!--<div class="jumbotron">-->
				<div class="">
					<div class="panel panel-default">
				
							<div class="panel-body">	
								<div class="col-xs-12 col-sm-12">

								<fieldset>
										<legend><h2 class="text-left">About</h2></legend>
										
									Rwanda Tourism and Travel Agency (<b><i>RTTA</b></i> in short) is a company that has been founded in 2013 by a small group of Rwandan Tours & Travel operators concerned about the quality of tourism services in the country with an objective to facilitate tourist Rwandans or those who visit Rwanda to travel easily.
									</fieldset>
								
									<fieldset>
										
									
										<legend><h2 class="text-left">Company Mission</h2></legend>
											<p>Provide our clients a unique experience, through which they connect with the best in our company, 
												and to offer top quality service to our entire clients and provided comfort abundance.</p>
									</fieldset>	

									<fieldset>
										<legend><h2 class="text-left">Company Vision</h2></legend>
											<p>The Dream of the company is to see majority of Rwandans or visitors benefit from tourism and travel through employment, capacity building and empowering local communities to improve their livelihood, alleviate poverty and strengthen unity among the Rwandans and the world</p>
									</fieldset>
									
									<br/><br/>
									<fieldset>
										<legend><h2 class="text-left">Featured Cars</h2></legend>
										<?php 

										$mydb->setQuery("SELECT *,typeName FROM car ro, cartype rt WHERE ro.typeID = rt.typeID");
								  		$cur = $mydb->loadResultList();

											foreach($cur as $car){
												$image = WEB_ROOT . 'admin/mod_car/'.$car->carImage;
												echo '<div style=" float:left;  margin:7px;">';		
												echo '<a href="'.$image.'" rel="prettyPhoto[mwaura]"><img src="'.$image.'" width="100px" height="120px" 
												style="-webkit-border-radius:5px; -moz-border-radius:5px;"  title="'.$car->carName.'" alt="'.$car->carName.'" >
												<br>'.$car->carName.'<br>'.$car->typeName.'</a>';
												echo'</div>';
												
											}


										?>

									</fieldset>


								</div>
							</div>
						</div>	

				</div>
		<!--	</div>-->
		</div>
		<!--/span--> 
		<!--Sidebar-->

	</div>
