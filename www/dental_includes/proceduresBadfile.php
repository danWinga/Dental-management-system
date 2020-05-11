
<?php
/*if(!isset($_SESSION))
{
session_start();
}*/
if(!userIsLoggedIn() or !userHasRole($pdo,23)){exit;}
echo "<div class='grid_12 page_heading'>TREATMENT PROCDURES</div>";
	if(isset($_SESSION['result_class']) and isset($_SESSION['result_message']) and $_SESSION['result_message']!='' and 
		$_SESSION['result_class']!=''){
			if($_SESSION['result_class']=='good'){
				echo "<div class='feedback $_SESSION[result_class]'>$_SESSION[result_message]</div>";
				$_SESSION['result_class']=$_SESSION['result_message']='';	
			}
			/*elseif($_SESSION['result_class']=='bad'){
				echo "<div class='feedback hide_element'></div>";
				$_SESSION['result_class']=$_SESSION['result_message']='';	
			}*/
		}
		
		

?>


<div class="grid-100">

<!-- start editing -->

<div class="row">
    <div class="col-md-12"> 

	<!-- start  content add -->
	<div class="container ">	
	<!-- <h2>Procedures And Treatment</h2> -->
		<!-- treee -->
<!-- Tab row start -->
<div class="row">
    <div class="col-md-12 container"> 
      <!-- Nav tabs -->
		<div class="card">
			<ul class="nav nav-tabs responsive-tabs">
					<li class="active"><a href="#procedures">Procedures Done</a></li>
					<li><a href="#profile1"> Settings</a></li>
					<li><a href="#settings" ><i class="fa fa-cog"></i>  <span>Old Settings</span></a></li>
					
			</ul>        
        <!-- Tab panes -->
        <div class="tab-content grid-100">
			<div class="tab-pane active" id="procedures">
				<?php 
					include('dental_procedure_upgrades/inc/header.php');
					
				?>			
					<!-- procedures dialog -->			
					<div id="addTreeModal" class="modal fade">
					<div class="modal-dialog">					
							<form method="post" id="treeview_form">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 align="center"><u> Add New Category</u></h3>
								<br/>
							</div>
							<div class="modal-body">
								<div class="form-group">
								
									<label> Select Parent Category</label>
									<select name="parent_category" id="parent_category" class="form-control">
										
									</select>
								</div>
								<div class="form-group">
									<label> Code prefix</label>
									<input type="text" name="category_code" 
									id="category_code" class="form-control"/>
								</div>
								<div class="form-group">
									<label> Enter Category Name</label>
									<input type="text" name="category_name" 
									id="category_name" class="form-control"/>
								</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="action" id="
									action" value="Add" class="btn-info"/>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
								</div>					
							</form>					
						</div>
					</div>
					<!-- end dialog -->	

				<div class="row">
					<div class="col-md-12">
						<!-- treeview  start -->
						<div class="col-md-4 ">
						<div class="grid_12 page_heading">
							<h3 align="center"><u> Procedure Category </u></h3></div>
							<br />				
							<br />		

							<div class="row" align="left">
								<div class="col-md-12" id="treeview">
								</div>
							</div>						
						</div>
						<!-- end treeview -->
						<!--table inside -->
						<div class="col-md-8 float-left">
						<!-- Start-->
							<div class="col-md-12">
								
								<div class="grid_12 page_heading">
								<h2 align="center">medical procedures list done per doctor</h2><br />
								</div>
								<div class="grid-100">
								<div class="form-group">
									<div class="input-group">
									<span class="input-group-addon">Search</span>
									<input type="text" name="search_text" class="grid-100" id="search_text" placeholder="Search by Procedure , Doctor , status" class="form-control" />
									</div>
								</div></div>

								<br />
								<div class="grid-100">
									<div id="result"></div>
								</div>
							</div>	
						</div>
						<!-- end table inside -->
					</div>	<!--  end row -->
				</div>				
			</div>		

			<div class="tab-pane" id="profile1">
			
				<!-- start table cont -->
				<div class="grid-100">
				<div class=" col-lg-12 col-md-12 col-sm-9 col-xs-12" align="right">   		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
						</div>
					</div>
				</div>
				<div class="col-md-12">
				<div class="grid_100">
				<table id="recordListing" class="table table-bordered table-striped ">
					<thead>
						<tr>
								<th>#</th>
								<th >NAME</th>					
								<th> REQUIRES TOOTH SPECIFICATION</th>					
								<th>COST</th>
								<th>TYPE</th>
								<th>UNLIST</th>								
								<th>CODE </th>
								<th>PARENT CATEGORY</th>
								<th></th>
								<th></th>					
						</tr>
					</thead>
				</table>
				</div>
				</div>
			</div>
			<div id="recordModal" class="modal fade">
				<div class="modal-dialog">
					<form method="post" id="recordForm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
							</div>
							<div class="modal-body">
							<div class="form-group">						
											<label> Select Parent Category</label>
											<select name="parent_category_id" id="parent_category_id" class="form-control">
																				
											</select>
										</div>						
									
										<div class="form-group">
											<label for="name" class="control-label">Procedure Name</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>			
										</div>

										<div class="form-group">						
											<label> Requires Tooth Specification </label>
											<select name="all_teeth" id="all_teeth" class="form-control">
											</select>
										</div>	
										<div class="control-label" id="restd"></div>
												
										<div class="form-group">
											<label for="cost" class="control-label">Cost</label>							
											<input type="number" class="form-control"  id="cost" name="cost" placeholder="Cost" required>							
										</div>	 
										<div class="form-group">
											<label for="code" class="control-label">Category Code</label>	
																	
											<!-- <textarea class="form-control" rows="5" id="address" name="address"></textarea> -->
											<input type="text" class="form-control"  id="code" name="code" placeholder="Category Code" required>								
										</div>
										<div class="form-group">
											<label> Unlist </label>
											<select name="listed" id="listed" class="form-control">
																				
											</select>							
											<!-- <input type="number" class="form-control" id="listed" name="listed" placeholder="Listed"> -->			
										</div>
										<div class="form-group">						
											<label> Procedure Type</label>
											<select name="type" id="type" class="form-control">
																				
											</select>
										</div>						
							</div>
							<div class="modal-footer">
								<input type="hidden" name="id" id="id" />
								<input type="hidden" name="action" id="action" value="" />
								<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</form>
				</div>
			</div>
				</div>
					



				<!-- end table cont-->
			
			</div>
		
			<!-- end tap-pane profile -->
		
			<div class="tab-pane" id="settings">
					<!-- start add content -->


					<div class='feedback2 hide_element'></div>
	<?php //include  '../inventory_includes/response.php'; ?>
	<!--<input type=button value='Add New Treatment Procedure' class=button_style id=add_new_treatment_procedure /> -->
	<button type="button" name="add" id="add_new_treatment_procedure" class="btn button_style ">Add New Treatment Procedure</button>
	<div  id="new_procedure_form_div" class="modal fade" >
		<div class="modal-dialog">
		<div class='feedback hide_element'></div>
		<form action="" class=patient_form method="post" name="new_procedures_form" id="new_procedures_form">
		<div class="modal-body grid-100">
			<?php $token = form_token(); $_SESSION['token_ep2'] = "$token";  ?>
			<input type="hidden" name="token_ep2"  value="<?php echo $_SESSION['token_ep2']; ?>" />
			<div class='grid-55 prefix-5 '><label for="" class="label">PROCEDURE NAME</label></div>
			<div class='grid-10'><label for="" class="label">TYPE</label></div>
			<div class='grid-10 '><label for="" class="label">COST</label></div>
			<div class='grid-20 grid-parent'><label for="" class="label">REQUIRES TOOTH SPECIFICATION<br>
				<div class='grid-50'>YES</div><div class='grid-50'>NO</div>
				</label>
			</div>
			<?php
			$i=1;
			$normal_type=$encrypt->encrypt(html('1'));
			$xray_type=$encrypt->encrypt(html('2'));
			while($i <= 8){
			echo "<div class='grid-100 grid-parent hover-row'>";
			echo "<div class=grid-5><label  class=label>$i</label></div>";
			echo "<div class='grid-55'><input type=text name='procedure_name$i'  /></div>";
			echo "<div class='grid-10'><select name=procedure_type$i >
					<option value='$normal_type'  >Normal</option>
					<option value='$xray_type' >X-Ray</option>
				</select></div>";
			echo "<div class='grid-10'><input type=text name='procedure_cost$i'  /></div>";
			echo "<div class='grid-10'><input type=radio name=tooth_specific$i value=yes /></div>";
			echo "<div class='grid-10'><input type=radio name=tooth_specific$i  value='no' /></div>";
			echo "</div>";
			echo "<div class=clear></div>";
			$i++;
			}
			?>
			<br><input  class=put_right type="submit"  value="Add Treatment Procedure"/>
			<div class=clear></div>
			</div>
			</form>	
			</div>
	
	
	</div>
	
	<?php
	//now show current insurance compmanies
	$sql=$error=$s='';$placeholders=array();
	$sql="select * from procedures where id!=1 and  id!=2 and id!=8 and id!=59 order by name";
	$error="Unable to select procedures done";
	$s = 	select_sql($sql, $placeholders, $error, $pdo);
	if($s->rowCount() > 0){
		$count=0;
		echo "
		<br><br><form class=patient_form action='' method=post name='old_procedures_form' id='old_procedures_form'>";?>
			<?php $token = form_token(); $_SESSION['token_ep1'] = "$token";  ?>
		<input type="hidden" name="token_ep1"  value="<?php echo $_SESSION['token_ep1']; ?>" />
		<table class='procedures_table'><caption>Treatment Procedures</caption><thead>
		<tr><th rowspan=2 class=count></th><th rowspan=2 class=proc_border>PROCEDURE NAME</th><th rowspan=2 class=proc_type>TYPE</th>
		<th rowspan=2 class=proc_cost>COST</th><th colspan=2 class=''>REQUIRES TOOTH SPECIFICATION</th>
		<th rowspan=2 class='delete'>UNLIST</th></tr>
		<tr><th class=yes_border>YES</th><th class=no_border>NO</th></tr></thead><tbody>
		<?php 
		foreach($s as $row){
			$count++;
			$procedure=html($row['name']);
			$val=$encrypt->encrypt(html($row['id']));
			$all_teeth=html($row['all_teeth']);
			if($row['cost'] > 0){$cost=html($row['cost']);}
			else{$cost='';}
			$yes=$no='';
			if($all_teeth=="yes"){$yes=" checked ";}
			elseif($all_teeth=="no"){$no=" checked ";}	
			$checked='';
			if($row['listed']==1){$checked=' checked ';}
			$normal_type_selected=$xray_type_selected='';
			if($row['type']==1){$normal_type_selected=" selected ";}
			elseif($row['type']==2){$xray_type_selected=" selected ";}
			echo "<tr><td>$count</td><td><input type=text name=procedure_name$count value='$procedure' /></td>";
			echo "<td><select name=procedure_type$count >
					<option value='$normal_type' $normal_type_selected >Normal</option>
					<option value='$xray_type' $xray_type_selected>X-Ray</option>
				</select></td>
			<td><input type=text name=procedure_cost$count value='$cost' /></td><td><input type=radio name=tooth_specific$count value=yes $yes /></td>";
			echo "<td><input type=radio name=tooth_specific$count  value='no' $no /></td>
					<td><input type=checkbox name=delete_procedure$count value='delete' $checked /></td>";
			echo "<input type=hidden name=ninye$count value='$val' /></tr>";
			
		}
		echo "</tbody></table>";
		$nisiana=$encrypt->encrypt($count);
		echo "<input type=hidden name=nisiana value='$nisiana' />";
		echo "<input class=put_right type=submit  value='Submit Changes' /></form>";
	}
	//else{<span class='center_text'>There are no insured Companies}

?>



					<!-- end added content -->
			</div>
			
				

    	</div>

    </div>
    </div>
	</div>
  
	

<!-- Tab end -->

	<!-- end treeview-->
	
</div>


	<!-- end content end -->
      


	<!-- removed content -->
						
			
        
      </div>
    </div>
  </div>

  



<!-- End editing -->





	

{
			if($_SESSION['result_class']=='good'){
				echo "<div class='feedback $_SESSION[result_class]'>$_SESSION[result_message]</div>";
				$_SESSION['result_class']=$_SESSION['result_message']='';	
			}
			/*elseif($_SESSION['result_class']=='bad'){
				echo "<div class='feedback hide_element'></div>";
				$_SESSION['result_class']=$_SESSION['result_message']='';	
			}*/
		}
		
		

?>


<div class="grid-100">
<!-- start editing -->

<div class="row">
    <div class="col-md-12"> 

	<!-- start  content add -->
	<div class="container ">	
	<!-- <h2>Procedures And Treatment</h2> -->
		<!-- treee -->
<!-- Tab row start -->
<div class="row">
    <div class="col-md-12 container"> 
      <!-- Nav tabs -->
		<div class="card">
			<ul class="nav nav-tabs responsive-tabs">
					<li class="active"><a href="#procedures">procedures</a></li>
					<li><a href="#profile1">Procedure Settings</a></li>
					<li><a href="#settings" ><i class="fa fa-cog"></i>  <span>Settings</span></a></li>
					<li><a href="#extra"> <i class="fa fa-plus-square-o"></i>  <span>extra</span></a></li>
			</ul>        
        <!-- Tab panes -->
        <div class="tab-content grid-100">
			<div class="tab-pane active" id="procedures">			
					<!-- procedures dialog -->			
					<div id="addTreeModal" class="modal fade">
					<div class="modal-dialog">					
							<form method="post" id="treeview_form">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 align="center"><u> Add New Category</u></h3>
								<br/>
							</div>
							<div class="modal-body">
								<div class="form-group">
								
									<label> Select Parent Category</label>
									<select name="parent_category" id="parent_category" class="form-control">
										
									</select>
								</div>
								<div class="form-group">
									<label> Code prefix</label>
									<input type="text" name="category_code" 
									id="category_code" class="form-control"/>
								</div>
								<div class="form-group">
									<label> Enter Category Name</label>
									<input type="text" name="category_name" 
									id="category_name" class="form-control"/>
								</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="action" id="
									action" value="Add" class="btn-info"/>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
								</div>					
							</form>					
						</div>
					</div>
					<!-- end dialog -->	

				<div class="row">
					<div class="col-md-12">
						<!-- treeview  start -->
						<div class="col-md-4 ">
							<h3 align="center"><u> Procedure Category </u></h3>
							<br />				
							<br />		

							<div class="row" align="left">
								<div class="col-md-12" id="treeview">
								</div>
							</div>						
						</div>
						<!-- end treeview -->
						<!--table inside -->
						<div class="col-md-8 float-left">
						<!-- Start-->
							<div class="col-md-12">
								<br />
								<h2 align="center">Procedure  done per Doctor</h2><br />
								<div class="form-group">
									<div class="input-group">
									<span class="input-group-addon">Search</span>
									<input type="text" name="search_text" id="search_text" placeholder="Search by Procedure , Doctor , status" class="form-control" />
									</div>
								</div>
								<br />
								<div id="result"></div>
							</div>	
						</div>
						<!-- end table inside -->
					</div>	<!--  end row -->
				</div>				
			</div>		

			<div class="tab-pane" id="profile1">
				<!-- start table cont -->
				<div class="grid-100">
				<div class=" col-lg-12 col-md-12 col-sm-9 col-xs-12" align="right">   		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
						</div>
					</div>
				</div>
				<div class="col-md-12">
				<table id="recordListing" class="table table-bordered table-striped ">
					<thead>
						<tr>
								<th>#</th>
								<th >NAME</th>					
								<th> REQUIRES TOOTH SPECIFICATION</th>					
								<th>COST</th>
								<th>TYPE</th>
								<th>UNLIST</th>								
								<th>CODE </th>
								<th>PARENT CATEGORY</th>
								<th></th>
								<th></th>					
						</tr>
					</thead>
				</table>
				</div>
			</div>
			<div id="recordModal" class="modal fade">
				<div class="modal-dialog">
					<form method="post" id="recordForm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
							</div>
							<div class="modal-body">
							<div class="form-group">						
											<label> Select Parent Category</label>
											<select name="parent_category_id" id="parent_category_id" class="form-control">
																				
											</select>
										</div>						
									
										<div class="form-group">
											<label for="name" class="control-label">Name</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>			
										</div>

										<div class="form-group">						
											<label> All teeth</label>
											<select name="all_teeth" id="all_teeth" class="form-control">
											</select>
										</div>	
										<div class="control-label" id="restd"></div>
												
										<div class="form-group">
											<label for="cost" class="control-label">Cost</label>							
											<input type="number" class="form-control"  id="cost" name="cost" placeholder="Cost" required>							
										</div>	 
										<div class="form-group">
											<label for="code" class="control-label">Category Code</label>	
																	
											<!-- <textarea class="form-control" rows="5" id="address" name="address"></textarea> -->
											<input type="text" class="form-control"  id="code" name="code" placeholder="Category Code" required>								
										</div>
										<div class="form-group">
											<label> Listed </label>
											<select name="listed" id="listed" class="form-control">
																				
											</select>							
											<!-- <input type="number" class="form-control" id="listed" name="listed" placeholder="Listed"> -->			
										</div>
										<div class="form-group">						
											<label> Select Type</label>
											<select name="type" id="type" class="form-control">
																				
											</select>
										</div>						
							</div>
							<div class="modal-footer">
								<input type="hidden" name="id" id="id" />
								<input type="hidden" name="action" id="action" value="" />
								<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</form>
				</div>
		</div>
				</div>
					



				<!-- end table cont-->
			
			</div>
		
			<!-- end tap-pane profile -->
		
			<div class="tab-pane" id="settings">
					<!-- start add content -->


					<div class='feedback2 hide_element'></div>
	<?php //include  '../inventory_includes/response.php'; ?>
	<!--<input type=button value='Add New Treatment Procedure' class=button_style id=add_new_treatment_procedure /> -->
	<button type="button" name="add" id="add_new_treatment_procedure" class="btn button_style ">Add New Treatment Procedure</button>
	<div  id="new_procedure_form_div" class="modal fade" >
		<div class="modal-dialog">
		<div class='feedback hide_element'></div>
		<form action="" class=patient_form method="post" name="new_procedures_form" id="new_procedures_form">
		<div class="modal-body grid-100">
			<?php $token = form_token(); $_SESSION['token_ep2'] = "$token";  ?>
			<input type="hidden" name="token_ep2"  value="<?php echo $_SESSION['token_ep2']; ?>" />
			<div class='grid-55 prefix-5 '><label for="" class="label">PROCEDURE NAME</label></div>
			<div class='grid-10'><label for="" class="label">TYPE</label></div>
			<div class='grid-10 '><label for="" class="label">COST</label></div>
			<div class='grid-20 grid-parent'><label for="" class="label">REQUIRES TOOTH SPECIFICATION<br>
				<div class='grid-50'>YES</div><div class='grid-50'>NO</div>
				</label>
			</div>
			<?php
			$i=1;
			$normal_type=$encrypt->encrypt(html('1'));
			$xray_type=$encrypt->encrypt(html('2'));
			while($i <= 8){
			echo "<div class='grid-100 grid-parent hover-row'>";
			echo "<div class=grid-5><label  class=label>$i</label></div>";
			echo "<div class='grid-55'><input type=text name='procedure_name$i'  /></div>";
			echo "<div class='grid-10'><select name=procedure_type$i >
					<option value='$normal_type'  >Normal</option>
					<option value='$xray_type' >X-Ray</option>
				</select></div>";
			echo "<div class='grid-10'><input type=text name='procedure_cost$i'  /></div>";
			echo "<div class='grid-10'><input type=radio name=tooth_specific$i value=yes /></div>";
			echo "<div class='grid-10'><input type=radio name=tooth_specific$i  value='no' /></div>";
			echo "</div>";
			echo "<div class=clear></div>";
			$i++;
			}
			?>
			<br><input  class=put_right type="submit"  value="Add Treatment Procedure"/>
			<div class=clear></div>
			</div>
			</form>	
			</div>
	
	
	</div>
	
	<?php
	//now show current insurance compmanies
	$sql=$error=$s='';$placeholders=array();
	$sql="select * from procedures where id!=1 and  id!=2 and id!=8 and id!=59 order by name";
	$error="Unable to select procedures done";
	$s = 	select_sql($sql, $placeholders, $error, $pdo);
	if($s->rowCount() > 0){
		$count=0;
		echo "
		<br><br><form class=patient_form action='' method=post name='old_procedures_form' id='old_procedures_form'>";?>
			<?php $token = form_token(); $_SESSION['token_ep1'] = "$token";  ?>
		<input type="hidden" name="token_ep1"  value="<?php echo $_SESSION['token_ep1']; ?>" />
		<table class='procedures_table'><caption>Treatment Procedures</caption><thead>
		<tr><th rowspan=2 class=count></th><th rowspan=2 class=proc_border>PROCEDURE NAME</th><th rowspan=2 class=proc_type>TYPE</th>
		<th rowspan=2 class=proc_cost>COST</th><th colspan=2 class=''>REQUIRES TOOTH SPECIFICATION</th>
		<th rowspan=2 class='delete'>UNLIST</th></tr>
		<tr><th class=yes_border>YES</th><th class=no_border>NO</th></tr></thead><tbody>
		<?php 
		foreach($s as $row){
			$count++;
			$procedure=html($row['name']);
			$val=$encrypt->encrypt(html($row['id']));
			$all_teeth=html($row['all_teeth']);
			if($row['cost'] > 0){$cost=html($row['cost']);}
			else{$cost='';}
			$yes=$no='';
			if($all_teeth=="yes"){$yes=" checked ";}
			elseif($all_teeth=="no"){$no=" checked ";}	
			$checked='';
			if($row['listed']==1){$checked=' checked ';}
			$normal_type_selected=$xray_type_selected='';
			if($row['type']==1){$normal_type_selected=" selected ";}
			elseif($row['type']==2){$xray_type_selected=" selected ";}
			echo "<tr><td>$count</td><td><input type=text name=procedure_name$count value='$procedure' /></td>";
			echo "<td><select name=procedure_type$count >
					<option value='$normal_type' $normal_type_selected >Normal</option>
					<option value='$xray_type' $xray_type_selected>X-Ray</option>
				</select></td>
			<td><input type=text name=procedure_cost$count value='$cost' /></td><td><input type=radio name=tooth_specific$count value=yes $yes /></td>";
			echo "<td><input type=radio name=tooth_specific$count  value='no' $no /></td>
					<td><input type=checkbox name=delete_procedure$count value='delete' $checked /></td>";
			echo "<input type=hidden name=ninye$count value='$val' /></tr>";
			
		}
		echo "</tbody></table>";
		$nisiana=$encrypt->encrypt($count);
		echo "<input type=hidden name=nisiana value='$nisiana' />";
		echo "<input class=put_right type=submit  value='Submit Changes' /></form>";
	}
	//else{<span class='center_text'>There are no insured Companies}

?>



					<!-- end added content -->
			</div>
			<div class="tab-pane" id="extra">
					fffffdddddd
			</div>
				

    	</div>

    </div>
    </div>
	</div>
  
	

<!-- Tab end -->

	<!-- end treeview-->
	
</div>


	<!-- end content end -->
      


	<!-- removed content -->
						
			
        
      </div>
    </div>
  </div>

  



<!-- End editing -->





	

