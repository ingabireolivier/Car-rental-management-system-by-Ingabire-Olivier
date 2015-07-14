
<div class="container">
	<?php
		check_message();
			
		?>
		<div class="panel panel-primary">
			<div class="panel-body">
			<h3 align="left">List of Cars</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-striped" cellspacing="0">
					
				  <thead>
				  	<tr  >
				  	<th>No.</th>
				  		<th align="left"  width="120">
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		Name</th>
				  		<th align="left"  width="200">Image</th>
				  		<th align="left" width="120">Type</th>
				  		<th align="left" width="120">Price/Rate</th>
				  		<th align="left" width="90">Seats</th>
				  		<th align="left"  width="200">Features</th>
				  		
				 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT *,typeName FROM car ro, cartype rt WHERE ro.typeID = rt.typeID");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td width="5%" align="center"></td>';
				  		echo '<td align="left"  width="120"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->carNo. '"/>
				  				<a  href="index.php?view=edit&id='.$result->carNo.'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=view&id='.$result->carNo.'">' . ' '.$result->carName.'</a></td>';
				  		echo '<td><a href="index.php?view=editpic&id='.$result->carNo.'"" title="Click here to Change Image."><img src="'. $result->carImage.'" width="60" height="60" title="<?php echo $carName; ?>"/></a></td>';
						echo '<td>'. $result->typeName.'</td>';
				  		echo '<td>'. $result->price.'</td>';
				  		echo '<td>'. $result->Seats.'</td>';
				  		echo '<td>'. $result->Features.'</td>';
				  		
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				 	
				</table>
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  	</div><!--End of Main Panel-->

</div><!--End of container-->

