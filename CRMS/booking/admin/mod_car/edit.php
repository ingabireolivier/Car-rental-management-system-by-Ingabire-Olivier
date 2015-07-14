
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Room();
$result = $rm->single_car($_SESSION['id']);
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>Edit Car</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              	<input name="rmNo" type="hidden" value="<?php echo $result->carNo; ?>">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Room Name" type="text" value="<?php echo $result->carName; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "rmtype">Car Type:</label>

              <div class="col-md-8">
              <select class="form-control input-sm" name="rmtype" id="rmtype"> 
                  	<option value="None">None</option>
                  	<?php
                  	$rm = new Roomtype();
                  	$cur= $rm->listOfcartype();
                  	foreach ($cur  as $rmtype) {
                  		echo '<option value='.$rmtype->typeID.'>'.$rmtype->typename.'</OPTION>';
                  	}

                  	?>
                  </select>	
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "price">Price/Rate:</label>

              <div class="col-md-8"> 
                <input class="form-control input-sm" id="price" name="price" placeholder=
									  "Price" type="text" value="<?php echo $result->price; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "adult">Seats:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="adult" name="adult" placeholder=
									  "Seats" type="text" value="<?php echo $result->Seats; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "featureren">Features:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="featureren" name="featureren" placeholder=
									  "Features" type="text" value="<?php echo $result->Features; ?>" >
              </div>
            </div>
          </div>
	
		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	
	
</form>


</div><!--End of container-->
			
