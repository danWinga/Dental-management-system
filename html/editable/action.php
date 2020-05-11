<?php
include_once("inc/db_connect.php");
if ($_POST['action'] == 'edit' && $_POST['id']) {	
	$updateField='';
	if(isset($_POST['name'])) {
		$updateField.= "name='".$_POST['name']."'";
	} else if(isset($_POST['gender'])) {
		$updateField.= "gender='".$_POST['gender']."'";
	} else if(isset($_POST['age'])) {
		$updateField.= "age='".$_POST['age']."'";
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
}
if ($_POST['action'] == 'delete' && $_POST['id']) {
	$sqlQuery = "DELETE FROM developers  WHERE id='" . $_POST['id'] . "'";	
	mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));	
	$data = array(
		"message"	=> "Record Deleted",	
		"status" => 1
	);
	echo json_encode($data);	
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$id = $_POST["id"];
	$name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
	$address = $_POST["address"];
	$destination = $_POST["destination"];
	$skills = $_POST["skills"];
	
	//$updateRecord($conn);


	if($id) {			
	  
		$stmt = $conn->prepare("
		UPDATE developers 
		SET name = ?, skills = ?, address = ?, gender = ?, designation = ?, age = ?
			WHERE id = ?");
			$id = htmlspecialchars(strip_tags($id));
			$name = htmlspecialchars(strip_tags($name));
			$gender = htmlspecialchars(strip_tags($gender));
			$skills = htmlspecialchars(strip_tags($skills));
			$destination = htmlspecialchars(strip_tags($destination));
			$address = htmlspecialchars(strip_tags($address));
			$age = htmlspecialchars(strip_tags($age));
				 
		
		
			$stmt->bind_param("sssssii", $name,$skills, $address, $gender, $destination, $age, $id);
		
		if($stmt->execute()){
			return true;
			$data = array(
				"message"	=> "Record Updated",	
				"status" => 1
			);
			echo json_encode($data);
		}
		
	}	
} 

function updateRecord($id, $name, $gender, $age, $address,$skills, $destination, $conn){
	//$data = 
	  
  if($id) {			
	  
	  $stmt = $conn->prepare("
	  UPDATE developers 
	  SET name = ?, skills = ?, address = ?, gender = ?, designation = ?, age = ?
		  WHERE id = ?");
		  $id = htmlspecialchars(strip_tags($id));
		  $name = htmlspecialchars(strip_tags($name));
		  $gender = htmlspecialchars(strip_tags($gender));
		  $skills = htmlspecialchars(strip_tags($skills));
		  $destination = htmlspecialchars(strip_tags($destination));
		  $address = htmlspecialchars(strip_tags($address));
		  $age = htmlspecialchars(strip_tags($age));
		       
	  
	  
		  $stmt->bind_param("sssssii", $name,$skills, $address, $gender, $destination, $age, $id);
	  
	  if($stmt->execute()){
		  return true;
	  }
	  
  }	
}
