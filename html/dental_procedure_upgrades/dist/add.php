
<?php
include('dental_procedure_upgrades/dist/database_connection.php');

$data = array(
    ':category_code'        =>      $_POST['category_code'],
    ':category_name'        =>     $_POST['category_name'],
    ':parent_category_id'   =>      $_POST['parent_category']
    

);
//CONCAT(:category_code ,SELECT(category_id FROM tbl_category WHERE parent_category_id = :parent_category_id  ORDER BY category_id DESC LIMIT 1))
$query = "
    INSERT INTO procedures (category_code, category_name, parent_category_id)
    values(:category_code, :category_name, :parent_category_id)";

$statement = $connect->prepare($query);

if($statement->execute($data)){
    echo 'Category Added';
}

?>

