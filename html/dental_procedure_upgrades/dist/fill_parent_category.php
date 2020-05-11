<?php

# include('database_connection.php');
include_once('database_connection.php');


$query = "SELECT * FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if($result > 0 ){

	echo $result;
} else{
	echo "Nothing found";
}


$output = '<option value="0"> Parent Category</option>';

foreach($result as $row){
	$output .= '<option value="'.$row[id].'">'.$row[name].'</option>';
}
 
 echo $output; 
 
?> 