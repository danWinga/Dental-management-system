<?php
/*if(!isset($_SESSION))
{
session_start();
}*/
if(!userIsLoggedIn() or !userHasRole($pdo,86)){exit;}
echo "<div class='grid_12 page_heading'>BACKUP DATABASE</div>";
?>
<div class=grid-container>
<?PHP
$now=date('Y-m-d-g-i-s');
#$file = "..\\dental_backups\\$now".".sql";
$file = "../dental_backups/$now".".sql";
#$command="\"C:\\Program Files\\VertrigoServ_230\\Mysql\\bin\\mysqldump.exe\"  --host=localhost --user=root --password=root dental --flush-logs --master-data=2 --delete-master-logs > $file";
$command="mysqldump  --host=localhost --user=root --password=root dental  >  $file";
exec($command, $ret_arr, $ret_code);
if($ret_code==0) {
	 $command2="tar -cvzf $file.tar.gz $file";
	exec($command2, $ret_arr2, $ret_code2);
	$command3="rm  $file";
	exec($command3, $ret_arr3, $ret_code3);
	if($ret_code3==0){echo "<label class=label>Database backup  taken successfully dddd</label>";}
}

#tar -cvzf $file1.tar.gz $file1
//$command="\"C:\\Program Files\\VertrigoServ_230\\Mysql\\bin\\mysqldump.exe\"  --host=localhost --user=root --password=CoA!b_U dental_new  > $file";
#exec($command, $ret_arr, $ret_code);
#if($ret_code==0) {echo "<label class=label>Database backup  taken successfully</label>";}
?>
</div>
