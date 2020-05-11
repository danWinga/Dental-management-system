<?php


//include_once  '../../dental_includes/magicquotes.inc.php'; 
include_once   '../../dental_includes/db.inc.php'; 
include_once   '../../dental_includes/dbsession.php';

//$session = new dbSession($pdo);

//session_start();
$session = new dbSession($pdo);
//include_once   '../../dental_includes/access.inc.php';
//include_once   '../../dental_includes/encryption.php';
//include_once    '../../dental_includes/helpers.inc.php';
include_once   '../../dental_includes/encryption.php';
$encrypt = new Encryption();

if(isset($_POST['procedure_code_id']) && !empty($_POST['procedure_code_id'])){
    
    $valx =$encrypt->encrypt(($_POST['procedure_code_id']));
    $outValue = $_POST['procedure_code_id'];
    echo $valx;
}

elseif(isset($_POST['action']) && isset($_POST['myOutPut'])){
    
    $myOutPutx = $_SESSION['procedure_encryp_id_array'];      
    echo json_encode(array_values($myOutPutx));
    exit;

}
else{
    $outValue = "No record found";
    echo $outValue;
}



?>

