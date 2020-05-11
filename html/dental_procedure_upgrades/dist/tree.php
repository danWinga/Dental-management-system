

<?php
$db = mysqli_connect('localhost', 'root', 'Admin@winga123', 'dental');
$sql = 'select id, name as name, name as text, parent_category_id from procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC';
$result = mysqli_query($db, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($tree_data as $k => &$v){
    $tmp_data[$v['id']] = &$v;
}

foreach($tree_data as $k => &$v){
    if($v['parent_category_id'] && isset($tmp_data[$v['parent_category_id']])){
        $tmp_data[$v['parent_category_id']]['nodes'][] = &$v;
    }
}

foreach($tree_data as $k => &$v){
    if($v['parent_category_id'] && isset($tmp_data[$v['parent_category_id']])){
        unset($tree_data[$k]);
    }
}

echo json_encode($tree_data);
?>

