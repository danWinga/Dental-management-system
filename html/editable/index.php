<?php 
include("inc/header.php"); 
?>
<title>web : Create Editable </title>
<?php include('inc/container.php');?>
<style>
table {
    background-color: #181818;
}
table, .table {
    color: #fff;
}
</style>
<div class="container">	
	<div class="row">
		<h2>Example: Create Editable L</h2>		
		<?php
		include_once("inc/db_connect.php");
		$sqlQuery = "SELECT * FROM developers  LIMIT 5";
		$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
		?>
		
		<table id="editableTable" class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Skills</th>
					<th>Age</th>
					<th>Destination</th>													
				</tr>
			</thead>
			<tbody>
				<?php while( $developer = mysqli_fetch_assoc($resultSet) ) { ?>
				   <tr id="<?php echo $developer ['id']; ?>">
				   <td><?php echo $developer ['id']; ?></td>
				   <td><?php echo $developer ['name']; ?></td>
				   <td>
				   <?php
				   	/*$output2 = '<select><option value="male"> select Type</option>';
					$typeValueOne = $typeNameOne="";
					$typeValueTwo = $typeNameTwo="";
					

						if($developer['gender']=="male"){
							$typeValueOne ="male";
							$typeNameOne="Male";
						}
						elseif ($developer['gender']=="female"){
							$typeValueTwo ="female";
							$typeNameTwo="Female";
				
						}
						
					
					$output2 .= '<option value="'.$typeValueOne.'">'.$typeNameOne.'</option>';
					$output2 .= '<option value="'.$typeValueTwo.'">'.$typeNameTwo.'</option> </select>';

					
					echo $output2; 
					*/
					echo $developer ['gender']; 
					?>
					</td>
				   <td><?php echo $developer ['address']; ?></td>
				   <td><?php echo $developer ['skills']; ?></td>
				   <td><?php echo $developer ['age']; ?></td>  
				   <td><?php echo $developer ['designation']; ?></td>				   				   				  
				   </tr>
				<?php } ?>

				
			</tbody>
		</table>	
  </div>
  <form action="" method="post">
		<label>Name:</label>
		<input id="namex" name="name" type="text">
		<label>Email:</label>
		<input id="emailx" name="emailx" type="text">
		<input id="submit" type="submit" value="Submit">
	</form>
  <div id="dialog" title="Dialog Form">
	<form action="" method="post">
	<label>Name:</label>
	<input id="name" name="name" type="text">
	<label>Email:</label>
	<input id="email" name="email" type="text">
	<input id="submit" type="submit" value="Submit">
	</form>
</div>

</div>
<script src="plugin/bootstable.js"></script>
<script src="js/editable.js"></script>
<?php include('inc/footer.php');?>




  
