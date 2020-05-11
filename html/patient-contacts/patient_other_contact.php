<?php




include_once     '../../dental_includes/includes_file2.php';

//include_once    '../../dental_includes/helpers.inc.php';*/
//include_once     '../../dental_includes/includes_file.php';
//echo "session id is ".$_SESSION['id'];

$encrypt = new Encryption();


$pt_firstName = $pt_middleName = $pt_lastName = $pt_gender = $pidx = $pt_religion= $pt_segment='';

if( (isset($_GET['selected_upd']) and $_GET['selected_upd']!='') and (isset($_GET['action']) and $_GET['action'] =='fill_pt_record' ) )
{

	
	// select patients details with selected_upd
	$selected_id=$encrypt->decrypt($_GET['selected_upd']);
	//echo $_GET(['selected_upd']);
	//echo  $pid;
	$sql2=$error2=$s2='';$placeholders2=array();
	$sql2="select * from patient_details_a where pid=:pid";
	$error2="Unable to get patient details a";
	$placeholders2[':pid']=$selected_id;
	$s2 = 	select_sql($sql2, $placeholders2, $error2, $pdo);
	$sub_array = array();
	$result = array();
	foreach($s2 as $row2){
		$val2=$encrypt->encrypt(html($row2['pid']));	
		$pt_firstName = html($row2['first_name']);
		$pt_middleName = html($row2['middle_name']);
		$pt_lastName =  html($row2['last_name']);
		
		$sub_array['firstName']= $pt_firstName;
		$sub_array['middleName']= $pt_middleName;	
		$sub_array['lastName']= $pt_lastName;	
				

	}
	// select patients details with selected_upd
	
	$sql2=$error2=$s2='';$placeholders2=array();
	$sql2="select * from patient_details_b where pid=:pid";
	$error2="Unable to get patient details b";
	$placeholders2[':pid']=$selected_id;
	$s2 = 	select_sql($sql2, $placeholders2, $error2, $pdo);
	
	foreach($s2 as $row2){
		$pt_gender = html($row2['gender']);
		//$pt_religion=$encrypt->encrypt(html($row['religion']));
		//$pt_segment=$encrypt->encrypt(html($row['patient_segment']));
		$pt_religion=html($row2['religion']);
		$pt_segment=html($row2['patient_segment']);
		$sub_array['gender']= $pt_gender;
		$sub_array['religion']= $pt_religion;
		$sub_array['segment']= $pt_segment;
		$result[] = $sub_array;		

	}

	//$outValue = "record iko sawa". $selected_id;
	//echo $outValue;
	echo json_encode(array_values($result));
	exit;
}
elseif( isset($_GET['selected_pt']) ){ 	
    
    //$myOutPutx = $_SESSION['procedure_encryp_id_array'];      
    //echo json_encode(array_values($myOutPutx));
    //exit;
    $pidx = $_GET['selected_pt'];
    $pid=$encrypt->decrypt($pidx);

    //$record_found = "thddddddddd" ;
	//$record_found = $pid;
	//$value = $value = mysql_real_escape_string($pid);//65471;
	//$record_found = intval($pid);


	$sql=$error=$s='';$placeholders=array();
	$sql = "select id,segment from patient_segment where id=:id order by segment";
	$error = "Unable to list patient segment";
	$placeholders[':id']=4;
	$s = 	select_sql($sql, $placeholders, $error, $pdo);	
	$name ="nnn";
	foreach($s as $row){
		$name=$row['segment'];
		$record_found =$name;
	}
	 
	echo  json_encode($record_found) ;
     exit;  
    

}
elseif( isset($_GET['selected_upd']) and ($_GET['selected_upd'] !='')  and (isset($_GET['action'])) and $_GET['action']=='patient_status' ){ 

	$pid=$encrypt->decrypt($_GET['selected_upd']);
	//$pid= isset($_GET['selected_pt']);
	//echo  $pid;
	//echo  $_GET['action'];
	$record_found = get_patient_basics($pdo,$pid,$encrypt);
	echo $record_found ;
	//echo  json_encode($pid) ;

	//echo  json_encode($record_found) ;
	// exit;
}
elseif( isset($_GET['selected_upd']) and ($_GET['selected_upd'] !='')  and (isset($_GET['action'])) and $_GET['action']=='patient_update_card_bal' ){ 

	$pid=$encrypt->decrypt($_GET['selected_upd']);
	//$pid= isset($_GET['selected_pt']);
	//echo  $pid;
	//echo  $_GET['action'];
	$record_found = get_patient_basics($pdo,$pid,$encrypt);
	echo $record_found ;
	//echo  json_encode($pid) ;

	//echo  json_encode($record_found) ;
	// exit;
}

else{
    $outValue = "No record found";
	echo $outValue;
	
}

?>

<div class=clear></div>

<div id='patient_other_details_update' class='grid-100 div_shower31a teeth_div'>
<fieldset >
	<div class='control-label table' id='patient_card_balx'></div> 
	<div class='row'>
		<div class='form-group grid-50 left'>
			<label class='control-label col-sm-2 label ' for='card_bal45'> Card Balance:</label>
			<div class='col-sm-6'>
				<input type="text" class="form-control" id="card_bal45" name="card_bal45" placeholder='update patient card balance'>
				

			</div>
		</div>
		<div class='form-group grid-25'>	
		
		 	
			 <input type="button" name="pt_update_pt_bal" id="pt_update_pt_bal" value="Update Card Balance" />
		</div>
	</div>
</fieldset >

<fieldset ><legend>Update Details</legend>

<div class=grid-75></div>


<div class=grid-100>

<div class='grid-50 left'>
	<div class='form-group row'>
		<label class='control-label col-sm-2 label ' for='first_name2'> First Name:</label>
		<div class='col-sm-6'>
			<input type='text' class='form-control ' id='first_name2' disabled='true'  placeholder='first name'>

		</div>
	</div>

	<div class='form-group row'>
		<label class='control-label col-sm-2 label' for='middle_name2'> Middle Name :</label>	
		<div class='col-sm-6'>
			<input type='middle_name2' class='form-control ' id='middle_name2' disabled='true'  placeholder='Middle Name'>

		</div>
	</div>

	<div class='form-group row'>
		<label class='control-label col-sm-2 label' for='last_name2'> Last Name:</label>	
		<div class='col-sm-6'>
			<input type='last_name2' class='form-control ' id='last_name2' disabled='true'  placeholder='Last Name'>	

		</div>
	</div>

	</div>
	<div class='grid-50 left'>

	<div class='form-group row'>
		<label class='control-label col-sm-2 label' for='gender2'> gender:</label>	
		<div class='col-sm-6'>
			<input type='text' class='form-control ' id='gender2' disabled='true'  placeholder='gender'>

		</div>
	</div>

	<div class='form-group row'>
		<label class='control-label col-sm-2 label ' for='patient_religion2'> Religion:</label>
		<div class='col-sm-6'>
		
			<select class='form-control' id='patient_religion2' name='patient_religion2' ><option>
			<?php
					$sql=$error=$s='';$placeholders=array();
					$sql = "select id,religion from patient_religion order by religion";
					$error = "Unable to list patient religion";
					$s = 	select_sql($sql, $placeholders, $error, $pdo);					
					foreach($s as $row){
						$name=html($row['religion']);
						//$val=$encrypt->encrypt(html($row['id']));
						$val=html($row['id']);
						echo "<option value='$val'>$name</option>";
						//if($_SESSION['religion']==$row['id']){echo "<option value='$val' selected>$name</option>";}
						//else{echo "<option value='$val'>$name</option>";}						
					}

					
				
			?>						
				</option></select>

		</div>
	</div>

	

	<div class='form-group row'>
		<label class='control-label col-sm-2 label' for='patient_segment2'> Segment:</label>	
		<div class='col-sm-6'>
		
			<select class='form-control' id='patient_segment2' name='patient_segment'><option>
			<?php
					$sql=$error=$s='';$placeholders=array();
					$sql = "select id,segment from patient_segment order by segment";
					$error = "Unable to list patient segment";
					$s = 	select_sql($sql, $placeholders, $error, $pdo);	
					foreach($s as $row){
						$name=html($row['segment']);
						//$val=$encrypt->encrypt(html($row['id']));
						$val=html($row['id']);
						echo "<option value='$val'>$name</option>";
						//if($_SESSION['patient_segment']==$row['id']){echo "<option value='$val' selected>$name</option>";}
						//else{echo "<option value='$val'>$name</option>";}							
						
					}
					
				
				?>					
				</option></select>

		</div>
	</div>
	</div>
		<div class=clear></div>
	

		<div class="modal-footer remove_left_padding">
			<div class="grid-30">
				<button type="button" id='pt_cancel_changes' class="btn btn-secondary foat-left" data-dismiss="modal">Cancel</button>
				<button type="button" id='pt_update_changes' class="btn btn-prmary float-left" data-dismiss="modal">Update</button>
			</div>
		</div>
	</div>

	</fieldset>
	
	</div>
	
</div>
				
			

				
			
		
		