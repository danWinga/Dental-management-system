<?php


require('inc/db_connect.php');


if(isset($_POST)){
	$sql = "UPDATE developers SET ".$_POST['name']."='".$_POST['value']."' WHERE id=".$_POST['pk'];
	//$mysqli->query($sql);
	mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
	echo 'Updated successfully.';
	$data = array(
		"message"	=> "Record Updated",	
		"status" => 1
	);
	echo json_encode($data);
}

if($updateField && $_POST['id']) {
	$sqlQuery = "UPDATE developers SET $updateField WHERE id='" . $_POST['id'] . "'";	
	mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));	
	$data = array(
		"message"	=> "Record Updated",	
		"status" => 1
	);
	echo json_encode($data);		
}


?>
