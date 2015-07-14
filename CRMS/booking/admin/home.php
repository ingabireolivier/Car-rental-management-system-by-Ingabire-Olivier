<div class="container">
<h3>Administrator Panel:Welcome <?php echo $_SESSION['admin_ACCOUNT_NAME'];?></h3>

<div class="panel-group" id="accordion">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Cartypes
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        This consists of the categories of cars that are in this company. Each Category of cars Has got unique features different form the other. For view all of the categories of all types of cars Click <a href="mod_cartype/index.php">HERE.</a>  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Cars
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      The company has got various cars that are categorised according to types. 
      Each car is of particular category and have a maximum number of people that can be accomodated. Click<a href="mod_car/index.php"> HERE.</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Reservation
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       In this area, you can view all the reservation transaction of all renter. And this area allow the the receptionist confirm the request of renter or either to cancel the reservation. Click <a href="mod_reservation/index.php">HERE.</a>
       </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
          Reports
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
       So far, you can generate reports all reservations made or in a certain period of time. Click <a href="mod_reports/index.php">HERE.</a>
       </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
          Users
        </a>
      </h4>
    </div>
    <div id="collapsesix" class="panel-collapse collapse">
      <div class="panel-body">
		The system displays the list of all people that have been registered in to the system.If a particular user is logged in the system the, such as users record is does not appear in the list of records. To view all the registered other than the logged in user Click <a href="mod_users/index.php">HERE.</a>
      </div>
    </div>
  </div>

</div>
</div>