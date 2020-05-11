<?php

include_once   '../../dental_includes/encryption.php';

$encrypt = new Encryption();


if(isset($_POST['procedure_code_id']) && !empty($_POST['procedure_code_id'])){
    //$outValue = "testing data";
    //$valx=html($_POST['procedure_code_id']);
    $valx =$encrypt->encrypt(($_POST['procedure_code_id']));
    $outValue = $_POST['procedure_code_id'];
    echo "my valuuuuu is :$valx ";
}else{
    $outValue = "No data found soooooooryyyy";
    echo $outValue;
}




?>

