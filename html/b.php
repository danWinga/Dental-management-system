<?php
include_once   '../land_includes/db.inc.php';
include_once  '../land_includes/magicquotes.inc.php'; 
include_once    '../land_includes/helpers.inc.php'; 
define("UPLOAD_DIR", "../land_pdfs/");
//get allpayments by bid,when_added and payment_id in payments pdf
$sql=$error=$s='';$placeholders=array();
$sql = "SELECT a.when_added, a.id AS pay_id, a.receipt_num, a.amount, a.bid, a.tx_number, a.buy_id, 
	b.pdf_name,c.first_name, c.middle_name, c.last_name, d.name as payment_type,a.buy_id,a.other_payment_id
		FROM payments a, payment_pdfs b, buyers c, payment_types d
		WHERE a.id = b.payment_id
		and a.bid=c.id and a.pay_type=d.id
		ORDER BY a.bid, a.when_added ";
$s = 	select_sql($sql, $placeholders, $error, $pdo);
echo " <table border=1><tr><th></th><th>customer</th><th>date receipted</th><th>payment type</th><th>tx number</th><th>receipt</th>
	<th>amount paid</th><th>Location</th><th>plot #</th></tr>";
$count=0;
foreach($s as $row){
	
	$pdf_name = $row['pdf_name'];
	 
	//check if file exists
	if(!file_exists (UPLOAD_DIR .$pdf_name )){
		$count++;
		//get plot descripition
		if($row['buy_id'] > 0){
			$plot_number=$title_prefix='';;
			$sql2=$error2=$s2='';$placeholders2=array();
			$sql2 = "select a.title_prefix, a.plot_number from plots a, buyer_plots b
					where b.id=:bid and b.plot_id=a.id ";
			$placeholders2[':bid'] = $row['buy_id'];
			$s2 = 	select_sql($sql2, $placeholders2, $error2, $pdo);
			foreach($s2 as $row2){
				$plot_number = $row2['plot_number'];
				$title_prefix = $row2['title_prefix'];
			}
		}
		else{
			$plot_number=$title_prefix='';;
			$sql2=$error2=$s2='';$placeholders2=array();
			$sql2 = "select name from other_payments where id=:other_payment_id";
			$placeholders2[':other_payment_id'] = $row['other_payment_id'];
			$s2 = 	select_sql($sql2, $placeholders2, $error2, $pdo);
			foreach($s2 as $row2){
				//$plot_number = $row2['plot_number'];
				$title_prefix = $row2['name'];
			}
		}
		$name=html("$row[first_name] $row[middle_name] $row[last_name]");
		$when_added = html($row['when_added']);
		$receipt_num = html($row['receipt_num']);
		$amount = number_format(html($row['amount']));
		$tx_number = html($row['tx_number']);
		$pay_type=html($row['payment_type']);
		echo "<tr><td>$count</td><td>$name</td><td>$when_added</td><td>$pay_type</td><td>$tx_number</td><td>$receipt_num</td><td>$amount</td>
			<td>$title_prefix</td><td>$plot_number</td></tr>";
	}
}
echo "</table>";
?>