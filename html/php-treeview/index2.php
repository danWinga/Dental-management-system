 <?php
//include("response.php");
?>  

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
<title>php Mysql Ajax</title>

</head>
<body>

<br/> <br />
<div class="container" style="width: 900px;">
	<h2 align="center">How to add New Node in Dynamic Treeviw using PHP Mysql Ajax </h2>

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
			
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		
		fill_parent_category();
		fill_treeview();

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
		$('#treeview_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"add.php",
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

	});
	
</script>

 

