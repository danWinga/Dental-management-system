<?php

# include('database_connection.php');
include('database_connection.php');

$query = "SELECT * FROM tbl_category ORDER BY category_name ASC";
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
	$output .= '<option value="'.$row[category_id].'">'.$row[category_name].'</option>';
}
 
 echo $output; 
 
?> 