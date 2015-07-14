<?php
if(isset($_POST['avail'])){
$_SESSION['from'] = $_POST['from'];
$_SESSION['to']  = $_POST['to'];

  redirect(WEB_ROOT. "index.php?page=5");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Car Rental Management System: <?php echo $title; ?></title>

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
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="<?php echo WEB_ROOT; ?>index.php">Home</a></li>
	           <!--  <li><a href="<?php echo WEB_ROOT; ?>index.php?page=2">Gallery</a></li> -->
	            <li><a href="<?php echo WEB_ROOT; ?>index.php?page=5">Cars and Rates</a></li>
	         <!--    <li><a href="<?php echo WEB_ROOT; ?>index.php?page=3">About us</a></li> -->
	            <li><a href="<?php echo WEB_ROOT; ?>index.php?page=4">Contact us</a></li>
	     <!--        <li><a href="<?php echo WEB_ROOT; ?>index.php?page=7">Site Map</a></li> -->
	             
	           				              
	          </ul>
	        </div><!-- /.nav-collapse -->
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
<div class="container">
<?php check_message(); ?>
<?php require_once $content;?>
	<!--/row-->
	
	<hr>
	     <footer>
        <p>&copy; 2014 <a href="admin/">BIT/02554/13/E </a> All rights reserved.</p>
  <!--      <script type="text/javascript" src="<?php echo WEB_ROOT; ?>jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
         <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/tooltip.js"></script>
		 <script type="text/javascript" src="<?php echo WEB_ROOT; ?>assets/js/jquery.js"></script>
	     <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>
		 <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/popover.js"></script>-->
		 <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		 <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
<!--	<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/prettyPhoto/prettyPhoto.js"  charset="utf-8"></script>
		<script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/facebox/facebox.js" ></script>-->

    <script type="text/javascript">
	// The facebox Jquery
	 $(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
	        loadingImage : 'images/facebox/loading.gif',
	        closeImage   : 'images/facebox/closelabel.png'
	           })    
	  });
	  
	  //The slideshow Jquery
	$(document).ready( function(){
		$('#slideshowHolder').jqFancyTransitions({ width: 477, height: 215 });
	});

	//The light box Jquery
				$(document).ready(function(){
					$("area[rel^='prettyPhoto']").prettyPhoto();
					
					$(".lightbox:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
					$(".lightbox:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
				});	
	</script>
    <script type="text/javascript">
	$('.from').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.to').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
    $(function() {
		var dates = $( "#from, #to" ).datepicker({									 
			defaultDate:'',
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
			var now =Date();
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $(this).data("datepicker"),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
</script>

<script type="text/javascript">
//in this line of code, to display the datetimepicker,  we used ‘form_datetime’ as an argument to be 
//passed in javascript. This is for Date and Time.
  
//this is for Date only	
 	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>
        <script>


		  function checkall(selector)
		  {
		    if(document.getElementById('chkall').checked==true)
		    {
		      var chkelement=document.getElementsByName(selector);
		      for(var i=0;i<chkelement.length;i++)
		      {
		        chkelement.item(i).checked=true;
		      }
		    }
		    else
		    {
		      var chkelement=document.getElementsByName(selector);
		      for(var i=0;i<chkelement.length;i++)
		      {
		        chkelement.item(i).checked=false;
		      }
		    }
		  }

		  function checkNumber(textBox)
			{
				while (textBox.value.length > 0 && isNaN(textBox.value)) {
					textBox.value = textBox.value.substring(0, textBox.value.length - 1)
				}
				textBox.value = trim(textBox.value);
			}
			//
			function checkText(textBox)
			{
				var alphaExp = /^[a-zA-Z]+$/;
				while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
					textBox.value = textBox.value.substring(0, textBox.value.length - 1)
				}
				textBox.value = trim(textBox.value);
			}
			function validateBook(){
				var j=document.forms["book"]["seats"].value;
				if (j==null || j=="")
				  {
				 alert("select from seats");
				  return false;
				  }
				var k=document.forms["book"]["feature"].value;
				if (k==null || k=="")
				  {
				  alert("select from kids ");
				  return false;
				  }
			}
			function dateDiff($start, $end) {

			$start_ts = strtotime($start);

			$end_ts = strtotime($end);

			$diff = $end_ts - $start_ts;

			return round($diff / 86400);

			}
		  </script>		
		   <script language="javascript" type="text/javascript">
		        /* Visit http://www.yaldex.com/ for full source code
		and get more free JavaScript, CSS and DHTML scripts! */
		        <!-- Begin
		        var timerID = null;
		        var timerRunning = false;
		        function stopclock (){
		            if(timerRunning)
		                clearTimeout(timerID);
		            timerRunning = false;
		        }
		        function showtime () {
		            var now = new Date();
		            var hours = now.getHours();
		            var minutes = now.getMinutes();
		            var seconds = now.getSeconds()
		            var timeValue = "" + ((hours >12) ? hours -12 :hours)
		            if (timeValue == "0") timeValue = 12;
		            timeValue += ((minutes < 10) ? ":0" : ":") + minutes
		            timeValue += ((seconds < 10) ? ":0" : ":") + seconds
		            timeValue += (hours >= 12) ? " P.M." : " A.M."
		            document.clock.face.value = timeValue;
		            timerID = setTimeout("showtime()",1000);
		            timerRunning = true;
		        }
		        function startclock() {
		            stopclock();
		            showtime();
		        }

		        window.onload=startclock;
		        // End -->
		        //Validates Personal Info
				function personalInfo(){
				var y=document.forms["personal"]["name"].value;
				var a=document.forms["personal"]["last"].value;
				var b=document.forms["personal"]["address"].value;
				var c=document.forms["personal"]["city"].value;
				var d=document.forms["personal"]["zip"].value;
				var e=document.forms["personal"]["country"].value;
				var f=document.forms["personal"]["email"].value;
				var g=document.forms["personal"]["cemail"].value;
				var x=document.forms["personal"]["phone"].value;
				var i=document.forms["personal"]["password"].value;
				var atpos=f.indexOf("@");
				var dotpos=f.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
				  {
				  alert("Not a valid e-mail address");
				  return false;
				  }
				if( f != g ) {
				alert("email does not match");
				  return false;
				} 
				if ((a=="Lastname" || a=="") || (b=="Address" || b=="") || (c=="City" || c=="") || (d=="ZIP Code" || d=="") || (e=="Country" || e=="") || (f=="Email" || f=="") || (g=="Confirm Email" || g=="")|| (x=="Contact Number" || x=="") || (y=="Firstname" || y=="") || (i=="Password" || i==""))
				  {
				  alert("all field are required!");
				  return false;
				  }
				 
				if (document.personal.condition.checked == false)
				{
				alert ('pls. agree the term and condition of our company');
				return false;
				}
				else
				{
				return true;
				}
				}
		    </SCRIPT>		
      </footer>
</div>
<!--/.container-->
</body>
</html>