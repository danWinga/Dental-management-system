<?php
//include("response.php");
?>  

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" href="dist/style.min.css" />
<script src="dist/jstree.min.js"></script>
<title>php Mysql Ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
</script>
<script type="text/javascript" charset="utf8" src="
 https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
 <link rel="stylesheet" type="text/css" href="
 https://cdnjs.cloudflare.com/1.2.0/bootstrap-treeview.min.css">



 <!-- others -->
 <link rel="stylesheet" href="dist/css/bootstrap-responsive-tabs.css">
<script src="dist/js/jquery.bootstrap-responsive-tabs.min.js"></script>

<!-- table css and js -->
<!--ddd 
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all"> 
<script src="dist/jquery-1.11.1.min.js"></script> 


<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/bootstrap.min.js"></script> 
<script src="dist/jquery.bootgrid.min.js"></script>


<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/bootstrap.min.js"></script> 
<script src="dist/jquery.bootgrid.min.js"></script>
-->


	



</head>
<body>

<br/> <br />
<div class="container" style="width: 900px;">
	<h2 align="center">Treatment Procedure </h2>

	<br/> <br />
	<div class="row">
		<div class="col-md-6">
			<h3 align="center"><u> Add New Category</u></h3>
			<br/>
			<form method="post" id="treeview_form">
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
				<div class="form-group">
					<input type="submit" name="action" id="
					action" value="Add" class="btn-info"/>
					
				</div>

				
			</form>

			
		</div>

		<div class="col-md-6">
			<h3 align="center"><u> Category Tree</u></h3>
			<br />
			<div id="treeview">
			</div>
			
		</div>
		

	</div>

	<!--     
			table-ffff
			-->
			<div class="row ">
		<div class="container">
      <div class="col-md-12">
        <h1>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</h1>
        <div class="col-sm-8">
		<div class="well clearfix">
			<div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Record</button></div></div>
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th data-column-id="id" data-type="numeric" data-identifier="true">Empid</th>
					<th data-column-id="employee_name">Name</th>
					<th data-column-id="employee_salary">Salary</th>
					<th data-column-id="employee_age">Age</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
				</tr>
			</thead>
		</table>
    </div>
      </div>
    </div>
	
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Employee</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Salary:</label>
                    <input type="text" class="form-control" id="salary" name="salary"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Age:</label>
                    <input type="text" class="form-control" id="age" name="age"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Employee</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Salary:</label>
                    <input type="text" class="form-control" id="edit_salary" name="edit_salary"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Age:</label>
                    <input type="text" class="form-control" id="edit_age" name="edit_age"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>


		</div>



	
  <div class="row">
    <div class="col-md-12"> 
      <!-- Nav tabs -->
      <div class="card">
	  <ul class="nav nav-tabs responsive-tabs">
			<li class="active"><a href="#home1">Home</a></li>
			<li><a href="#profile1">Profile</a></li>
			<li><a href="#settings" ><i class="fa fa-cog"></i>  <span>Settings</span></a></li>
			<li><a href="#extra"> <i class="fa fa-plus-square-o"></i>  <span>extra</span></a></li>
		</ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
			<div class="tab-pane active" id="home1">
				
			<p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				
			</div>

			<div class="tab-pane" id="profile1">
				<p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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




</div>
</body>
</html>


<script >
	$(document).ready(function(){
		
		fill_parent_category();
		fill_treeview();

		$('#treeview_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"dist/add.php",
				method: "POST",
				data: $(this).serialize(),
				success: function(data){
					
					fill_parent_category();
					fill_treeview();					
					$('#treeview_form')[0].reset();
					alert(data)
				}
			})

		});
		populateEmloyeeTable();
		responsive-tabs();

		

	});

	function responsive-tabs(){
		$('.responsive-tabs').responsiveTabs({
			accordionOn: ['xs', 'sm'] // xs, sm, md, lg
		});
	}

	function fill_treeview()
		{
			$.ajax({
				 method: "POST",  
				  url: "fetch.php",  
				  dataType: "json",  
				success: function(data){
					$('#treeview').treeview({
						data:data,
						multiSelect: false,
						highlightSelected: true,
						onNodeSelected: function(event, node) {
							
							if (node.nodes == undefined) {
								alert('Node Undefined');
							// sends node info to another element
							} else if (node.state.expanded) {
							// TODO collapse children 
							collapseNode(node.nodeId);
							
							}
							 else if (node.nodes == 'LI') {
								alert('Node LI');
							 }
							 else if (node.state.selected){
															
								alert("node selected"+ node.nodeId +": \n Node text:"+ node.text +": \n Node nodes:"+ node.id+": \n Node code:"+ node.code);
								console.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
      
								
								
							}

							 else {
							// TODO expand children 
							expandNode(node.nodeId);
							
							}
							
						}
					});
										
										
				}
			})
		}

		

		function collapseNode(nodeId) {
			$('#treeview').treeview('collapseNode', [nodeId]);
			alert("collapse " + nodeId);
		}

		function expandNode(nodeId) {
			$('#treeview').treeview('expandNode', [nodeId]);
					
			alert("expand " + nodeId );
			
		}

				

		function fill_parent_category()
		{
			$.ajax({

				url:'fill_parent_category.php',
				success: function(data){
					$('#parent_category').html(data);
				}

			})
		}
		

	function  populateEmloyeeTable(){

		var grid = $("#employee_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "response.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_id);
                    console.log(g_name);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {
							
                                // collect the data
                                $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#edit_name').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_salary').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_age').val(ele.siblings(':nth-of-type(4)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('response.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback), 
										$("#employee_grid").bootgrid('reload');
                                }); 
								//$(this).parent('tr').remove();
								//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });

	}
	
</script>



 
