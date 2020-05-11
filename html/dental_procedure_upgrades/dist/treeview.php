<?php
    
    //require 'database_connection.php';
    include_once('database_connection.php');
  
    $parentKey = '0';
    $sql = "SELECT * FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC";
  
    $result = $mysqli->query($sql);

   

    if(mysqli_num_rows($result) > 0)
      {
          $data = membersTree($mysqli,$parentKey);
      }else{
          $data=["id"=>"0","name"=>"No Members present in list","text"=>"No Members is present in list","nodes"=>[]];
      }
   
      if(mysqli_num_rows($result) > 0)
      {
          $data = membersTree($mysqli,$parentKey);
      }else{
          $data=["id"=>"0","name"=>"No Members present in list","text"=>"No Members is present in list","nodes"=>[]];
      }
   
      function membersTree($mysqli,$parentKey)
      {
         // require 'database_connection.php';
  
          $sql = 'SELECT * from procedures WHERE parent_category_id="'.$parentKey.'" and id!=1 and  id!=2 and id!=8 and id!=59'; 
  
          $result = $mysqli->query($sql);
          $output = array();
          while($value = mysqli_fetch_assoc($result)){
             $id = $value['id'];
             $row1[$id]['id'] = $value['id'];
             $row1[$id]['code'] = $value['code'];
             $row1[$id]['name'] = $value['name'];
             $row1[$id]['text'] = $value['code']. " ".$value['name'];
             $row1[$id]['nodes'] = array_values(membersTree($mysqli,$value['id']));

                         
          }
          return $row1;
      }
  
      echo json_encode(array_values($data));
  
?>

