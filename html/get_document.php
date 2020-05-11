<?php
date_default_timezone_set('Africa/Nairobi');
	include_once  '../land_includes/magicquotes.inc.php'; 
	include_once   '../land_includes/db.inc.php'; 
	include_once '../land_includes/dbsession.php';
	$session = new dbSession($pdo);

	include_once   '../land_includes/access.inc.php';
	//include_once   '../land_includes/encryption.php';
	include_once    '../land_includes/helpers.inc.php';
	//include_once    '../land_includes/phpmailer/class.phpmailer.php';
	//include_once     '../land_includes/fpdf/fpdf.php';
	if(!isset($_SESSION))
{
session_start();
}
if(!userIsLoggedIn()  ){exit;}
//echo"yy";
//display template
/*
if(isset($_GET['template'])){
	 
		$file_name=$_GET['template'];
		$filename = "../land_sale_documents/$file_name";
		header("Content-Length: " . filesize($filename));
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		readfile($filename);
	 
}*/
//https://localhost/get_sale_document.php?template=sd357.docx

if(isset($_GET['template']) and isset($_GET['type'])){
		//get receipt_pdf
		if($_GET['type'] == 'receipt'){
			$file_name=$_GET['template'];
			$filename = "../land_pdfs/$file_name";
			header("Content-Length: " . filesize($filename));
			header("Content-type:application/pdf");
			readfile($filename);
		}
		//get sale document
		elseif($_GET['type'] == 'sale_document'){
			$file_name=$_GET['template'];
			$filename = "../land_sale_documents/$file_name";
			header("Content-Length: " . filesize($filename));
			header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			readfile($filename);
		}
		//get title document
		elseif($_GET['type'] == 'title_document'){
			$file_name=$_GET['template'];
			$filename = "../land_title_documents/$file_name";
			header("Content-Length: " . filesize($filename));
			header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			readfile($filename);
		}
	 
}
		
?>