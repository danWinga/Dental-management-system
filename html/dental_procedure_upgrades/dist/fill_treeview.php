
<?php


include_once('database_connection.php');

$parent_category_id = 0;

$query = "SELECT * FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $data = get_node_data($parent_category_id, $connect);

}
echo json_encode(array_values($data));

function get_node_data($parent_category_id, $connect){
    if(isset($_POST["query"]) )
    {   
        $search = mysqli_real_escape_string($connect, $_POST["query"]);

        $query = "SELECT * FROM procedures WHERE parent_category_id = '
    ".$parent_category_id."' and  name LIKE '%".$search."%' and id!=1 and  id!=2 and id!=8 and id!=59 ";
    }else{
        $query = "SELECT * FROM procedures WHERE parent_category_id = '
    ".$parent_category_id."' and id!=1 and  id!=2 and id!=8 and id!=59 ";

    }
    

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = array();

    foreach($result as $row)
    {
        $sub_array = array();
        $id = $row['id'];
        //$val2=$encrypt->encrypt(($row['id']));
        $sub_array['id'] = $row['id'];
        //$sub_array['id'] = $val2;
        $sub_array['code'] = $row['code'];
        $sub_array['name'] = $row['name'];
        $sub_array['text'] = $row['code']. " ".$row['name'];
        $sub_array['nodes'] = array_values(get_node_data($row['id'], $connect));
        //$sub_array['nodes'] = array_values(get_node_data($val2, $connect));

        $output[] = $sub_array;
    }
    return $output;

}




?>