
<form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

	<fieldset>
		<legend>New User Account</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Account Name" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "username">Email Address:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="username" name="username" placeholder=
									  "Email Address" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "pass">Password:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="pass" name="pass" placeholder=
									  "Account Password" type="Password" value="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "type">Type:</label>

              <div class="col-md-8">
                <select class="form-control input-sm" name="type" id="type">
                  <option value="Administrator">Administrator</option>
                
                </select> 
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
			
