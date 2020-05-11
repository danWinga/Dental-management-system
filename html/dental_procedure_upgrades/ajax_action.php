<?php

include_once 'config/Database.php';
//include_once 'class/Records.php';
include_once 'class/Procedures.php';
include_once 'class/ProcedurePerDoctor.php';

$dbx = mysqli_connect("localhost", "root", "Admin@winga123", "dental");
$databaseB = new Database();
$db = $databaseB->getConnectionB();


//$record = new Records($db); Procedures

$record = new Procedures($dbx);
$summery = new ProceduresPerDoctor($db);


if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$record->setName($_POST["name"]);
    $record->setAll_teeth($_POST["all_teeth"]);
    $record->setCost($_POST["cost"]);
	$record->setType($_POST["type"]);
	$record->setListed($_POST["listed"]);
	$record->setCode($_POST["code"]);
	$record->setParent_category_id($_POST["parent_category_id"]);
	$record->addRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->setId( $_POST["id"]);
	$record->getRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->setId($_POST["id"]);
	$record->setName($_POST["name"]);
    $record->setAll_teeth($_POST["all_teeth"]);
    $record->setCost($_POST["cost"]);
	$record->setType($_POST["type"]);
	$record->setListed($_POST["listed"]);
	$record->setCode($_POST["code"]);
	$record->setParent_category_id($_POST["parent_category_id"]);
	$record->updateRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->setId($_POST["id"]);
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


<?php
/** 
include_once 'config/Database.php';
//include_once 'class/Records.php';
include_once 'class/Procedures.php';
include_once 'class/ProcedurePerDoctor.php';


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