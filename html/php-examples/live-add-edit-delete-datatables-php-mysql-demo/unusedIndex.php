<?php 
include('inc/header.php');
?>
<title>Live Add Edit Delete datatables Records with Ajax, PHP and MySQL</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/ajax.js"></script>	
<?php include('inc/container.php');?>

<div class="container">	
	<h2>Procedures And Treatment</h2>	

	<!-- treee -->

	

<!-- Tab row start -->

<div class="row">

    <div class="col-md-12"> 
      <!-- Nav tabs -->
		<div class="card">
		<ul class="nav nav-tabs responsive-tabs">
				<li class="active"><a href="#procedures">procedures</a></li>
				<li><a href="#profile1">Profile</a></li>
				<li><a href="#settings" ><i class="fa fa-cog"></i>  <span>Settings</span></a></li>
				<li><a href="#extra"> <i class="fa fa-plus-square-o"></i>  <span>extra</span></a></li>
		</ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
			<div class="tab-pane active" id="procedures">				
			
			<!-- procedures -->

			
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


		
		<div class="row">
		
			<div class="col-md-3 container">
				<h3 align="center"><u> Category Tree</u></h3>
				<br />
				<div class="row" align="right">				
					<div class="col-md-12" align="right">
						<button type="button" name="addProcedure" id="addProcedure" class="btn btn-success">Add New Procedure</button>
					</div>
				</div>
				</br>
			

				<div class="row" align="left">
					<div class="col-md-12" id="treeview">
					</div>
				</div>						
			</div>

			<!table inside -->
			<div class="col-md-7 float-left">

			<!-- Start-->


		<div class="container">	
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
						<div class="form-group"
							<label for="name" class="control-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>			
						</div>
						<div class="form-group">
							<label for="all_teeth" class="control-label">All Teeth</label>							
							<input type="number" class="form-control" id="all_teeth" name="all_teeth" placeholder="All teeth">							
						</div>	   	
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
							<label for="listed" class="control-label"> Listed </label>							
							<input type="number" class="form-control" id="listed" name="listed" placeholder="Listed">			
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


			<!-- End content -->



			</div>

			<!-- end table inside -->

		</div>
			<!-- pro end -->
				
		</div>

		<div class="tab-pane" id="profile1">

		
		</div>		
		<div class="tab-pane" id="settings">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..
		</div>
		<div class="tab-pane" id="extra">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..
		</div>

    </div>

    </div>
    </div>
  </div>

  

 


		

<!-- Tab end -->
<!--
<div class="container">	
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
					<th>Age</th>					
					<th>Skills</th>
					<th>Address</th>
					<th>Designation</th>					
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
						<div class="form-group"
							<label for="name" class="control-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>			
						</div>
						<div class="form-group">
							<label for="age" class="control-label">Age</label>							
							<input type="number" class="form-control" id="age" name="age" placeholder="Age">							
						</div>	   	
						<div class="form-group">
							<label for="lastname" class="control-label">Skills</label>							
							<input type="text" class="form-control"  id="skills" name="skills" placeholder="Skills" required>							
						</div>	 
						<div class="form-group">
							<label for="address" class="control-label">Address</label>							
							<textarea class="form-control" rows="5" id="address" name="address"></textarea>							
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Designation</label>							
							<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">			
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

	-->
	<!-- end treeview-->
	
</div>


<?php include('inc/footer.php');?>
