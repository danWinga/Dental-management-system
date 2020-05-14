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


	$output2 = '<option value=""> select Type</option>';
	$typeTeethValueOne = $typeTeethNameOne="";
	$typeTeethValueTwo = $typeTeethNameTwo="";

	foreach($result as $row){

		
		if ($row['all_teeth']=="no"){
			$typeTeethValueTwo ="no";
			$typeTeethNameTwo="No";

		}
		if($row['all_teeth']=="yes"){
			$typeTeethValueOne ="yes";
			$typeTeethNameOne="Yes";
		}
		
		//$output .= '<option value="'.$row['id'].'">'.$row['all_teeth'].'</option>';
	}
	$output2 .= '<option value="'.$typeTeethValueOne.'">'.$typeTeethNameOne.'</option>';
	$output2 .= '<option value="'.$typeTeethValueTwo.'">'.$typeTeethNameTwo.'</option>';
	
	echo $output2; 
//}


?> 

