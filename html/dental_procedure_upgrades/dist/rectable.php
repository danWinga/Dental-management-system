<?php
//fetch.php
//$connect = mysqli_connect("localhost", "root", "Admin@winga123", "dental");
//include_once'database_connection.php';

$connect = mysqli_connect("127.0.0.1", "root", "Admin@winga123", "dental");

//function listRecords(){
//if (isset($_POST['listRecords'])) {

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {

    listRecords($connect);
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$name = $_POST["name"];
    $all_teeth = $_POST["all_teeth"];
    $cost = $_POST["cost"];
	$type = $_POST["type"];
	$listed = $_POST["listed"];
	$code = $_POST["code"];
	$parent_category_id = $_POST["parent_category_id"];
	$addRecord($connect);
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$id =  $_POST["id"];
	getRecord($id,$connect);
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$id = $_POST["id"];
	$name = $_POST["name"];
    $all_teeth = $_POST["all_teeth"];
    $cost = $_POST["cost"];
	$type = $_POST["type"];
	$listed = $_POST["listed"];
	$code = $_POST["code"];
	$parent_category_id = $_POST["parent_category_id"];
	$updateRecord($connect);
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$id = $_POST["id"];
	$deleteRecord($id , $connect);
}

function listRecords($connect){
    $columns = array('id', 'name', 'all_teeth', 'cost', 'type','listed', 'code','parent_category_id');

    //$query = "SELECT * FROM procedures WHERE ";
    $query = "SELECT * FROM procedures ";

    if($_POST["is_date_search"] == "yes")
    {
    $query .= 'order_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
    }


    if(isset($_POST["search"]["value"]))
    {
    
    $query .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
    $query.= ' OR all_teeth LIKE "%'.$_POST["search"]["value"].'%" ';
    $query.= ' OR cost LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR type LIKE "%'.$_POST["search"]["value"].'%" ';	
    $query .= ' OR listed LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR code LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR parent_category_id LIKE "%'.$_POST["search"]["value"].'%" ';	
    $query .= ' AND id!=1 and  id!=2 and id!=8 and id!=59 )';
    }

    if(isset($_POST["order"]))
    {
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
    }
    else
    {
        $query .= 'ORDER BY id DESC ';
    }

    $query1 = '';

    if($_POST["length"] != -1)
    {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query . $query1);

    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        $sub_array = array();
        $typeSel=$listType ='';
        $sub_array[] = $row["id"];
        $sub_array[] = $row["name"];
        $sub_array[] = $row["all_teeth"];
        $sub_array[] = $row["cost"];

        if($row['type']== 0){
            $typeSel ="sijui";
            $sub_array[] = $typeSel;
        }
        if($row['type']== 1){
            $typeSel ="Normal";
            $sub_array[] = $typeSel;
        }
        if($row['type']== 2){
            $typeSel ="Xray";
            $sub_array[] = $typeSel;
        }
        if($row['listed']== 0){
            $listType ="no";
            $sub_array[] = $listType;
        }
        if($row['listed']== 1){
            $listType ="yes";
            $sub_array[] = $listType;
        }
        $sub_array[] = $row['code'];
        $sub_array[] = $row['parent_category_id'];					
        $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
        $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
        
        $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
        $query = "SELECT * FROM tbl_order";
        $result = mysqli_query($connect, $query);
        return mysqli_num_rows($result);
    }

    $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
    );

    echo json_encode($output);
    
 }

  function updateRecord($id, $name, $all_teeth, $cost, $type,$listed, $code,$parent_category_id, $connect){
      //$data = 
		
    if($id) {			
        
        $stmt = $connect->prepare("
        UPDATE procedures 
        SET name = ?, all_teeth = ?, cost = ?, type = ?, listed = ?, code = ?, parent_category_id = ?
			WHERE id = ?");
            $id = htmlspecialchars(strip_tags($id));
			$name = htmlspecialchars(strip_tags($name));
			$all_teeth = htmlspecialchars(strip_tags($all_teeth));
			$cost = htmlspecialchars(strip_tags($cost));
			$type = htmlspecialchars(strip_tags($type));
			$listed = htmlspecialchars(strip_tags($listed));
			$code = htmlspecialchars(strip_tags($code));
			$parent_category_id = htmlspecialchars(strip_tags($parent_category_id));        
        
        
            $stmt->bind_param("sssssssi", $name, $all_teeth, $cost, $type, $listed, $code, $parent_category_id, $id);
        
        if($stmt->execute()){
            return true;
        }
        
    }	
}
function getRecord($id, $connect){
    if($id ){
        
        $sqlQuery = "
            SELECT * FROM procedures 
            WHERE id = ?";			
        $stmt = $connect->prepare($sqlQuery);
        $stmt->bind_param("i", $id);	
        $stmt->execute();
        $result = $stmt->get_result();
        $record = $result->fetch_assoc();
        echo json_encode($record);
        
    }
    else{
        echo "sorry record not found";
    }
}

function addRecord($connect){
		
    if($name) {

        $stmt = $connect->prepare("
        INSERT INTO procedures(`name`, `all_teeth`, `cost`, `type`, `listed`, `code`, `parent_category_id`)
        VALUES(?,?,?,?,?,?,?)");
    
        $
			$name = htmlspecialchars(strip_tags($name));
			$all_teeth = htmlspecialchars(strip_tags($all_teeth));
			$cost = htmlspecialchars(strip_tags($cost));
			$type = htmlspecialchars(strip_tags($type));
			$listed = htmlspecialchars(strip_tags($listed));
			$code = htmlspecialchars(strip_tags($code));
			$parent_category_id = htmlspecialchars(strip_tags($parent_category_id)); 
        
        
            $stmt->bind_param("ssssssi", $name, $all_teeth, $cost, $type, $listed, $code, $parent_category_id);
        
        if($stmt->execute()){
            return true;
        }		
    }
}
function deleteRecord($id, $connect){
    if($id) {			

        $stmt = $connect->prepare("
            DELETE FROM procedures 
            WHERE id = ?");

        $id = htmlspecialchars(strip_tags($id));

        $stmt->bind_param("i", $id);

        if($stmt->execute()){
            return true;
        }
    }
}

?>

