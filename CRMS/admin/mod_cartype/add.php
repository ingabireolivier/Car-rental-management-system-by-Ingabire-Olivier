
<form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

	<fieldset>
		<legend>New Cartype</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Type Name" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "description">Description:</label>

              <div class="col-md-8">
                   <input class="form-control input-sm" id="description" name="description" placeholder=
									  "Description" type="text" value="">
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
			

