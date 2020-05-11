<?php

include_once('database_connection.php');
$sql = "SELECT id, name , Concat(RTrim(code), ' (', RTrim(name), ')') AS
text  FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC ";
$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    //iterate on results row and create new index array of data
    while( $row = mysqli_fetch_assoc($res) ) { 
        $data[] = $row;
    }
    $itemsByReference = array();

// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['id']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
   if($item['parent_category_id'] && isset($itemsByReference[$item['parent_category_id']]))
      $itemsByReference [$item['parent_category_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
   if($item['parent_category_id'] && isset($itemsByReference[$item['parent_category_id']]))
      unset($data[$key]);
}
// Encode:
echo json_encode($data);

?>
