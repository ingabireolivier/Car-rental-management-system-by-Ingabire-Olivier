<?php

$arival    = $_SESSION['from']; 
$dropoff = $_SESSION['to'];
$name      = $_SESSION['name']; 
$last      = $_SESSION['last'];
$country   = $_SESSION['country'];
$city      = $_SESSION['city'] ;
$address   = $_SESSION['address'];
$zip       = $_SESSION['zip'] ;
$phone     = $_SESSION['phone'];
$email     = $_SESSION['email'];
$password  = $_SESSION['pass'];
$carid   = $_SESSION['carid'];
$_SESSION['pending'] = 'pending';
$stat     = $_SESSION['pending'];
$days     = dateDiff($arival,$dropoff);

if(isset($_POST['btnsubmitbooking'])){
  $message = $_POST['message'];
function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}
  $confirmation = createRandomPassword();
  $_SESSION['confirmation'] = $confirmation;
  $mydb->setQuery("SELECT * FROM car where carNo={$carid}");
  $rmprice = $mydb->executeQuery();
  while($row = mysql_fetch_assoc($rmprice)){
    $rate = $row['price']; 
  }  
  $payable= $rate*$days;
  $_SESSION['pay']= $payable;

  //check renter

  $mydb->setQuery("SELECT * 
                FROM  renter 
                WHERE  `phone` ='{$phone}' OR email='{$email}'");
  $cur = $mydb->executeQuery();
  $row_count = $mydb->num_rows($cur);
  if ($row_count >=1 ) {

    $rows = $mydb->fetch_array($cur);
    $lastrenter= $rows['renter_id'];

    $mydb->setQuery("UPDATE renter SET firstname='$name',lastname='$last',
                          country='$country',city='$city',address='$address',
                          zip='$zip',phone='$phone',email='$email',password='$password' 
                      WHERE renter_id='$lastrenter'");
    $res = $mydb->executeQuery();

  }else{

    $mydb->setQuery("INSERT INTO renter (firstname,lastname,country,city,address,zip,phone,email,password)
      VALUES ('$name','$last','$country','$city','$address','$zip','$phone','$email','$password')");
    $res = $mydb->executeQuery();
    $lastrenter=mysql_insert_id(); 
   
   } 
  $mydb->setQuery("INSERT INTO reservation (carNo,renter_id,pickup,dropoff,seats,feature,payable,status,confirmation)
          VALUES ('$carid','$lastrenter','$arival','$dropoff','1','0','$payable','$stat','$confirmation')");
  $res = $mydb->executeQuery();
  $lastreserv=mysql_insert_id(); 
  $mydb->setQuery("INSERT INTO `comments` (`firstname`, `lastname`, `email`, `comment`) VALUES('$name','$last','$email','$message')");
  $msg = $mydb->executeQuery();
  message("New [". $name ."] created successfully!", "success");
  //  unsetSessions();
    redirect("index.php?view=detail");
}

?>

<div class="container">
  <?php include'../sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
             
                 <?php // include'navigator.php';?>


          <td valign="top" class="body" style="padding-bottom:10px;">
                    <form action="index.php?view=payment" method="post"  name="personal" >
           <fieldset >
           <legend><h2>Billing Details</h2></legend>
           <p>

            <strong>FIRST NAME:</strong> <?php echo $name;?> <br/>
            <strong>LAST NAME:</strong> <?php echo $last;?><br/>
            <strong>COUNTRY:</strong> <?php echo $country;?><br/>
            <strong>CITY:</strong> <?php  echo $city;?><br/>
            <strong>ADDRESS:</strong> <?php echo $address;?><br/>
            <strong>ZIP CODE:</strong> <?php echo $zip; ?><br/>
            <strong>PHONE:</strong> <?php echo $phone;?><br/>
            <strong>E-MAIL:</strong> <?php echo $email;?><br/>
          </p>

        <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#999999">
              <th width="10">#</th>
              <th align="center" width="120">Car Model</th>
              <th align="center" width="120">Pick up Date</th>
              <th align="center" width="120">Drop off Date</th>
              <th align="center" width="120">Days</th>
             
               <th align="center" width="120">Quantity</th>
              <th align="center" width="90">Features</th>
                <th  width="120">Day Price</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
              
            <?php
            
    
              $mydb->setQuery("SELECT *,typeName FROM car ro, cartype rt WHERE ro.typeID = rt.typeID and carNo =". $_SESSION['carid']);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<tr>'; 
              echo '<td></td>';
              echo '<td>'. $result->carName.'</td>';
              echo '<td>'.$arival.'</td>';
              echo '<td>'.$dropoff.'</td>';
              echo '<td>'.$days.'</td>';
              
               echo '<td >1</td>';
                echo '<td >RWF'. $result->Features.'</td>';
        echo '<td >RWF'. $result->price.'</td>';

              
              echo '</tr>';
            } 
           $payable= $result->price *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
           <tr>
                   <td colspan="6"></td><td align="right"><h5><b>Order Total:  </b></h5>
                   <td align="left">
                  <h5><b> <?php echo 'RWF'.$payable= $days*$result->price; ?></b></h5>
                                   
                  </td>
          </tr>
         <tr>
                  <!--  <td colspan="4"></td><td colspan="5">
                            <div class="col-xs-12 col-sm-12" align="right">
                                <button type="submit" class="btn btn-primary" align="right" name="btnlogin">Payout</button>
                            </div>
                   
                     </td> -->
          </tr>
         
          </tfoot>  
        </table>
              
                 <div class="form-group">
                  <div class="col-md-12">
                    

                    <div class="col-md-10">
                   <button type="submit" class="btn btn-primary" align="right" name="btnsubmitbooking">Submit Booking</button>
                    </div>
                  </div>
                </div>



              </form>

            </div>
          </div>  
          
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->



