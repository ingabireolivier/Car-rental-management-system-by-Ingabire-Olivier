<?php
/*$renterid =$_GET['renterid'];
$renter = new renter();
$result=$renter->single_renter($renterid);*/

  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  $country =$_SESSION['country'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  $email = $_SESSION['email'];
  $password =$_SESSION['pass'];
  $stat = $_SESSION['pending'];

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

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
           <fieldset >
           <legend><h2>Reservation Details</h2></legend>
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Sir/Madam <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <?php echo $email;?><br/><br/>
           Dear Sir/Madam. <?php echo $last;?>,<br/><br/>
           Greetings from Rwanda Tourism & Travel Agency!<br/><br/>
           Please check the details of your reservation:<br/><br/>
           <strong>Renter's NAME(S):</strong> <?php echo $name.' '.$last;?>


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

           
            ?>
            <?php
             $arival   = $_SESSION['from']; 
              $dropoff = $_SESSION['to']; 
              $days = dateDiff($arival,$dropoff);
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
                   <td colspan="6"></td><td align="right"><h5><b>Order Total: RWF </b></h5>
                   <td align="left">
                  <h5><b> <?php echo $payable= $days*$result->price; ?></b></h5>
                                   
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

       
<p>We are eagerly anticipating your pick up and would like to advise you of the following in order to help you with your trip planning.Your reservation number is <b><?php echo $_SESSION['confirmation']?>:</b><br/><br/>Should there be a concern with your reservation, a customer service representative will contact you. Otherwise, consider your reservation confirmed.</p>
<ul>
 <li>Down-payment of Twenty percent (20%) of the contract amount (fare) shall be paid prior before 2 days to the pick up date and send us the copy of Payment proof to our email [rttarwanda@gmail.com], otherwise your booking will be cancelled.
 <li>Other of eighty percent left (80%) of the contract amount (fare) shall be paid prior to the pick-up date.</li>
 <li>If and when cancellation of booking shall be made on or before only 1 day to the pick up date, 20 percent (20%) down-payment shall not be returned.</li>
 <li>All rentals require a clean driving record.</li>
 <li>A valid driver's license or any valid and recent ID in the name of the renter will be required at the time of Pick up date</li>
<li>Copy of All Payment Proof.</li>
<li>Authorization letter issued by payer for renter/s whose transactions were paid for in his/ her behalf.</li> <br/>
<p>
[<B>BANK DETAILS</B>]<BR/> 03948763849-22 ECOBANK<BR/>004038948664 BANK OF KIGALI<BR/>[<B>OR</B>]<BR/><a href="https://www.paypal.com/webapps/mpp/send-money-online" target="_blank">Pay with paypall</a></li><BR/>
</p>
<strong>I have agreed that I will present the above documents upon the pick up date:</strong><br/>
 </ul>
If you have any questions, please email us at rttarwanda@gmail.com or call (+250) 788 747 764
<br/><br/>
Thank you for choosing Rwanda Tourism & Travel Agency
<br/>
Respectfully yours,<br/>
Rwanda Tourism & Travel Agency
<br/><br/><br/>
</span>
<div id="divButtons" name="divButtons">
<input type="button" value="Print" onclick="tablePrint();" class="btn btn-primary">
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
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>