<?php
include_once 'config/Database.php';
include_once 'class/Procedures.php';

$database = new Database();
$db = $database->getConnection();

$record = new Procedures($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listProcedures();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {
	$record->name = $_POST["name"];
    $record->all_teeth = $_POST["all_teeth"];
    $record->cost = $_POST["cost"];
	$record->type = $_POST["type"];
	$record->listed = $_POST["listed"];
	$record->code = $_POST["code"];
	$record->parent_category_id = $_POST["parent_category_id"];
	$record->addProcedure();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getProcedure();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->id = $_POST["id"];
	$record->name = $_POST["name"];
    $record->all_teeth = $_POST["all_teeth"];
    $record->cost = $_POST["cost"];
	$record->type = $_POST["type"];
	$record->listed = $_POST["listed"];
	$record->code = $_POST["code"];
	$record->parent_category_id = $_POST["parent_category_id"];
	$record->updateProcedure();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteProcedure();
}
?>