<?php 
include('dental_procedure_upgrades/inc/header.php');
	
?>
<title>Procedure </title>

<?php include('dental_procedure_upgrades/inc/container.php');?>

<div class="container contact">	
	<h2>Procedures And Treatment</h2>
		<!-- treee -->
<!-- Tab row start -->
<div class="row">
    <div class="col-md-12"> 
      <!-- Nav tabs -->
		<div class="card">
			<ul class="nav nav-tabs responsive-tabs">
					<li class="active"><a href="#procedures">procedures</a></li>
					<li><a href="#profile1">Procedure Settings</a></li>
					<li><a href="#settings" ><i class="fa fa-cog"></i>  <span>Settings</span></a></li>
					<li><a href="#extra"> <i class="fa fa-plus-square-o"></i>  <span>extra</span></a></li>
			</ul>        
        <!-- Tab panes -->
        <div class="tab-content">
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
				<div class="container contact">
				<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
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
				<table id="recordListing" class="table table-bordered table-striped">
					<thead>
						<tr>
								<th>#</th>
								<th >Name</th>					
								<th>AllTeeth</th>					
								<th>Cost</th>
								<th>type</th>
								<th>listed</th>								
								<th>Code </th>
								<th> parent</th>
								<th></th>
								<th></th>					
						</tr>
					</thead>
				</table>
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
											<label> UnListed </label>
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
					ddddddd
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




<?php include('dental_procedure_upgrades/inc/footer.php');?>