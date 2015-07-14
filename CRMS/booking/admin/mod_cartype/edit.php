
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Roomtype();
$result = $rm->single_cartype($_SESSION['id']);

?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

	<fieldset>
		<legend>Edit Cartype</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              		<input name="rmtype_id" type="hidden" value="<?php echo $result->typeID; ?>">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Type Name" type="text" value="<?php echo $result->typename; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "description">Description:</label>

              <div class="col-md-8">
                   <input class="form-control input-sm" id="description" name="description" placeholder=
									  "Description" type="text" value="<?php echo $result->Desp; ?>">
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
			

