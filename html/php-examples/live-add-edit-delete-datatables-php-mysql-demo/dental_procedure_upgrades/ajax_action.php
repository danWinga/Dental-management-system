<?php
include_once 'config/Database.php';
include_once 'class/Procedures.php';
include_once 'class/ProcedurePerDoctor.php';


$database = new Database();
$db = $database->getConnection();

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


?>