
<?php
$pickup = $_SESSION['from']; 
$dropoff = $_SESSION['to'];


 /*if(!isset($_POST['seats'])){
    message("Choose from Seats!", "error");  
    redirect(".WEB_ROOT. 'booking/");
    //exit;
 }*/
 /* if(isset($_POST['seats'])&&isset($_POST['feature'])){
    $_SESSION['carid']=$_POST['carid'];
  $_SESSION['seats'] = $_POST['seats'];
  $_SESSION['feature']  = $_POST['feature'];
   */
  if (!isset($_SESSION['carid'])){
    
 redirect(WEB_ROOT);
  }
 if (isset($_POST['clear'])){
  unset($_SESSION['carid']);
  redirect(WEB_ROOT);

 }
 
?>


<!--End of Header-->
<div class="container">
  <?php include'../sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
             <form action="" method="POST">
                 <?php //include'navigator.php';?>
                  <h3 align="center">Your Booking Cart</h3>
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
              <td colspan="4"><h5><b>Order Total: RWF  <?php echo $_SESSION['pay'];?></b></h5></td><td colspan="5"> 
                            <div class="col-xs-12 col-sm-12" align="right">
                               <button type="submit" class="btn btn-primary" align="right"name="clear">Clear Cart</button>
                               <?php
                                if (isset($_SESSION['renter_id'])){
                                  ?>
                                  <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=payment" class="btn btn-primary" align="right"name="continue">Continue Booking</a>
                                 <?php 
                                }else{ ?>
                                   <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=info"class="btn btn-primary" align="right"name="continue">Continue Booking</a>
                               <?php
                                }

                               ?>
                                 
                            </div>
                   
            </td>
            </tr>
          </tfoot>  
        </table>
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
</div>