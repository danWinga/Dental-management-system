<?php

include_once   '../../dental_includes/encryption.php';
//include_once  '../../dental_includes/magicquotes.inc.php'; 
//include_once   '../../dental_includes/db.inc.php'; 
//include_once   '../../dental_includes/dbsession.php';
//$session = new dbSession($pdo);
//include_once   '../../dental_includes/access.inc.php';
//include_once   '../../dental_includes/encryption.php';
//include_once    '../../dental_includes/helpers.inc.php';
$encrypt = new Encryption();

if(isset($_POST['procedure_code_id']) && !empty($_POST['procedure_code_id'])){
    //$outValue = "testing data";
    //$valx=html($_POST['procedure_code_id']);
    $valx =$encrypt->encrypt(($_POST['procedure_code_id']));
    $outValue = $_POST['procedure_code_id'];
    echo $outValue;
}else{
    $outValue = "No data found soooooooryyyy";
    echo $outValue;
}



/** 
if(!empty($_POST['action']) && $_POST['action'] == 'procedure_code_idxx') {
    $outValue = '';
    if(isset($_POST['procidure_div_id'])){
        
            $value = $_POST['procedure_code_id'];
            
            
            $outValue = 90000;

       echo   procedure_codeId($outValue);
    }
    
}

**/


?>
