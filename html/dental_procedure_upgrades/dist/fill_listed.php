<?php

# include('database_connection.php');
include_once('database_connection.php');


 /** 

if(!empty($_POST['action']) && $_POST['action'] == 'fillAllTeeth') {
	fill_all_teeth();
}
*/

//function fill_all_teeth(){
	$query = "SELECT * FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC";
	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	if($result > 0 ){

		echo $result;
	} else{
		echo "Nothing found";
	}


	$output2 = '<option value="0"> select Type</option>';
	$typeValueOne = $typeNameOne="";
	$typeValueTwo = $typeNameTwo="";

	foreach($result as $row){

		if($row['listed']=="0"){
			$typeValueOne ="0";
			$typeNameOne="List";
		}
		elseif ($row['listed']=="1"){
			$typeValueTwo ="1";
			$typeNameTwo="Unlist";

		}
		
		//$output .= '<option value="'.$row['id'].'">'.$row['all_teeth'].'</option>';
	}
	$output2 .= '<option value="'.$typeValueOne.'">'.$typeNameOne.'</option>';
	$output2 .= '<option value="'.$typeValueTwo.'">'.$typeNameTwo.'</option>';
	
	echo $output2; 
//}


?> 


