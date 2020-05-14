<?php
include_once 'mmconfig/Database.php';
//include_once 'class/Records.php';
include_once 'mmclass/Procedures.php';
include_once 'mmclass/ProcedurePerDoctor.php';


$database = new Database();
$db = $database->getConnection();

//$record = new Records($db); Procedures

$record = new Procedures($db);
$summery = new ProceduresPerDoctor($db);


if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$record->name = $_POST["name"];
    $record->all_teeth = $_POST["all_teeth"];
    $record->cost = $_POST["cost"];
	$record->type = $_POST["type"];
	$record->code = $_POST["code"];
	$record->listed = $_POST["listed"];
	$record->parent_category_id = $_POST["parent_category_id"];
	$record->addRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->id = $_POST["id"];
	$record->name = $_POST["name"];
    $record->all_teeth = $_POST["all_teeth"];
    $record->cost = $_POST["cost"];
	$record->type = $_POST["type"];
	$record->code = $_POST["code"];
	$record->listed = $_POST["listed"];
	$record->parent_category_id = $_POST["parent_category_id"];
	$record->updateRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'listProcedureSummery') {
	$summery->listSummeryRecords();
}
/**
 * if(!empty($_POST['action']) && $_POST['action'] == 'fillType') {
	$record->fill_type_option();
}
 

if(!empty($_POST['action']) && $_POST['action'] == 'fillAllTeeth') {
	$record->fill_all_teeth_option();
}
*/

?>