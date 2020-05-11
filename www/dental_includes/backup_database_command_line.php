<?PHP
date_default_timezone_set('Africa/Nairobi');
$now=date('Y-m-d-g-i-s');
#$file = "\"C:\\Program Files\\VertrigoServ_230\\dental_backups\\$now".".sql";
#$command="\"C:\\Program Files\\VertrigoServ_230\\Mysql\\bin\\mysqldump.exe\"  --host=localhost --user=root --password=root dental --flush-logs --master-data=2 --delete-master-logs > $file";
//$command="\"C:\\Program Files\\VertrigoServ_230\\Mysql\\bin\\mysqldump.exe\"  --host=localhost --user=root --password=CoA!b_U dental  > $file";
$file = "/var/www/dental_backups/$now".".sql";
$command="mysqldump  --host=localhost --user=root --password=root dental  >  $file";
exec($command, $ret_arr, $ret_code);
#if($ret_code==0) {
#         $command2="tar -cvzf $file.tar.gz $file";
#        exec($command2, $ret_arr2, $ret_code2);
#        $command3="rm  $file";
#        exec($command3, $ret_arr3, $ret_code3);
#}



$command2="tar -cvzf  /var/www/dental_backups/$now.tar.gz $file  /var/www/dental-images /var/www/dental_includes /var/www/html/examination /var/www/html/profile /var/www/html/print_receipts /var/www/html/phpmailer /var/www/html/medical-information /var/www/html/female-patients /var/www/html/diseases /var/www/html/dental-information /var/www/html/dental-images /var/www/html/completion /var/www/html/cadcam /var/www/html/treatment-plan /var/www/html/patient-contacts /var/www/html/index.php /var/www/html/dental_css /var/www/html/dental_b /var/www/html/treatment-done";;
exec($command2, $ret_arr, $ret_code);

$command3="rm  $file";
exec($command3, $ret_arr3, $ret_code3);
//if($ret_code==0) {echo "Database backup  taken successfully";}
?>
