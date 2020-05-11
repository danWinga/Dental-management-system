<?php
//fetch.php
//$connect = mysqli_connect("localhost", "root", "Admin@winga123", "dental");
include_once('database_connection.php');
$query = "
SELECT * FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC
";
$result = mysqli_query($conn, $query);
//$output = array();
while($row = mysqli_fetch_array($result))
{
 $sub_data["id"] = $row["id"];
 $sub_data["name"] = $row["name"];
 //$sub_data["text"] = $row["name"];
 $sub_data['text'] = $row['code']. " ".$row['name'];
 //$sub_data["parent_category_id"] = $row["parent_category_id"];
 $data[] = $sub_data;
}
foreach($data as $key => &$value)
{
 $output[$value["id"]] = &$value;
}
foreach($data as $key => &$value)
{
 if($value["parent_category_id"] && isset($output[$value["parent_category_id"]]))
 {
  $output[$value["parent_category_id"]]["nodes"][] = &$value;
 }
}
foreach($data as $key => &$value)
{
 if($value["parent_category_id"] && isset($output[$value["parent_category_id"]]))
 {
  unset($data[$key]);
 }
}
echo json_encode($data);
/*echo '<pre>';
print_r($data);
echo '</pre>';*/

?>
