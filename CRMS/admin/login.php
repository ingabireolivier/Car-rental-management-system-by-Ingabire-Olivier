<?php
require_once("../includes/initialize.php");
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Car Rental Management System: Admin Login</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo WEB_ROOT; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-modal.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.toggle-modal').click(function(){
		$('#logout').modal('toggle');
	}); 
});
</script>

<!-- Custom styles for this template -->

<link href="<?php echo WEB_ROOT; ?>css/offcanvas.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
 <link href="css/facebox/facebox.css" media="screen" rel="stylesheet"  type="text/css" />
 <link href="css/signin.css" rel="stylesheet">
</head>

<body>
<!--Header-->
	    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?php echo WEB_ROOT; ?>index.php">Car Rental Management System</a>
	        </div>
	        
	      </div><!-- /.container -->
	    </div><!-- /.navbar -->

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well">

				<!-- <img  width="1100px" hieght="100px" class="img-rounded"/> -->
					<div class="media">
					  <a class="pull-left" href="#">
					    <img class="media-object" src="<?php echo WEB_ROOT; ?>img/banner1.png" alt="...">
					  </a>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--End of Header-->



    

   

  <body>
<?php
 if (admin_logged_in()) {
?>
   <script type="text/javascript">
            redirect('progressbar.php');
    </script>
    <?php
}
if (isset($_POST['btnlogin'])) {
    //form has been submitted1
    
    $uname = trim($_POST['email']);
    $upass = trim($_POST['pass']);
    
    $h_upass = sha1($upass);
    //check if the email and password is equal to nothing or null then it will show message box
    if ($uname == '' OR $upass == '') {
?>    <script type="text/javascript">
                alert("Invalid Username and Password!");
                </script>
            <?php
        
    } else {
    //it creates a new objects of member
        $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::AuthenticateUser($uname, $h_upass);
    //then it check if the function return to true
    if($res == true){
      ?>   <script type="text/javascript">
          //then it will be redirected to home.php
          window.location = "index.php";
        </script>
      <?php
    
    
    } else {
?>    <script type="text/javascript">
                alert("Username or Password Not Registered! Contact Your administrator.");
                window.location = "index.php";
                </script>
        <?php
        }
        
    }
} else {
    
    $email = "";
    $upass = "";
    
}

?>
    <div class="container">

      <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">Admin, Please sign in </h2>
         <input type="text" class="form-control" placeholder="Email address" name="email" autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnlogin">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
