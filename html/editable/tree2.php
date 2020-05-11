
<?php


include_once('database_connetion.php');

$sql = "SELECT * FROM procedures ";
	$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		//iterate on results row and create new index array of data
		while( $row = mysqli_fetch_assoc($res) ) { 
			$tmp = array();
			$tmp['id'] = $row['id'];
			$tmp['name'] = $row['name'];
			$tmp['text'] = $row['name'];
			$tmp['parent_category_id'] = $row['parent_category_id'];
			$tmp['code'] = $row['code'];
			array_push($data, $tmp); 
		}
		$itemsByReference = array();

	// Build array of item references:
	foreach($data as $key => &$item) {
	   $itemsByReference[$item['id']] = &$item;
	   // Children array:
	   $itemsByReference[$item['id']]['nodes'] = array();
	}

	// Set items as children of the relevant parent item.
	foreach($data as $key => &$item)  {
	//echo "<pre>";print_r($itemsByReference[$item['parent_id']]);die;
	   if($item['parent_category_id'] && isset($itemsByReference[$item['parent_category_id']])) {
	      $itemsByReference [$item['parent_category_id']]['nodes'][] = &$item;
		}
	}
	//echo json_encode($itemsByReference);

	?>


<?php
    
    require 'database_connetion.php';
  
    $parentKey = '0';
    $sql = "SELECT * FROM procedures";
  
    $studresult = $mysqli->query($sql);
   
      if(mysqli_num_rows($studresult) > 0)
      {
          $data = studentsTree($parentKey);
      }else{
          $data=["id"=>"0","name"=>"No procedures present in list","text"=>"No procedures is present in list","nodes"=>[]];
      }
   
      function studentsTree($parentKey)
      {
		require 'database_connetion.php';
  
          $sql = 'SELECT id, name, code from procedures WHERE parent_category_id="'.$parentKey.'"';
  
          $studresult = $mysqli->query($sql);
  
          while($datavalue = mysqli_fetch_assoc($studresult)){
             $id = $datavalue['id'];
             $allstudData[$id]['id'] = $datavalue['id'];
             $allstudData[$id]['name'] = $datavalue['name'];
             $allstudData[$id]['text'] = $datavalue['code']." ".$datavalue['name'];
             $allstudData[$id]['nodes'] = array_values(studentsTree($datavalue['id']));
          }
  
          return $allstudData;
      }
  
      echo json_encode(array_values($data));
  
