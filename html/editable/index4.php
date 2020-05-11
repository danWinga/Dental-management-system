<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
<link rel="stylesheet" href="/dental_procedure_upgrades/dist/js/bootstrap.min.css">

<script src="/dental_procedure_upgrades/dist/js/jquery.min.js"></script>
<script src="/dental_procedure_upgrades/dist/js/bootstrap.min.js"></script>
<!-- jQuery --> 

           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

<!-- <link rel="stylesheet" href="dental_b/dist/css/bootstrap-responsive-tabs.css"> -->
<script type="text/javascript" charset="utf8" src="/dental_procedure_upgrades/
dist/cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
 <link rel="stylesheet" type="text/css" href="/dental_procedure_upgrades/dist/treeview_css/cdnjs.cloudflare.com/1.2.0/bootstrap-treeview.min.css"/>

 <link rel="stylesheet" href="/dental_procedure_upgrades/dist/css/bootstrap-responsive-tabs.css">
<script src="/dental_procedure_upgrades/dist/js/jquery.bootstrap-responsive-tabs.min.js"></script>

<script src="/dental_procedure_upgrades/js/jquery.dataTables.min.js"></script>
<script src="/dental_procedure_upgrades/js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="/dental_procedure_upgrades/css/dataTables.bootstrap.min.css" />




<title>Modal</title>
</head>
<body>
	<div class="container">


	<div class="container">
	<div style="display: none;" >
	<?php

          # include('database_connection.php');
          include_once('database_connetion.php');


          $query = "SELECT * FROM procedures where id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY name ASC";
          $statement = $connect->prepare($query);

          $statement->execute();

          $result = $statement->fetchAll();

          if($result > 0 ){

            echo $result;
          } else{
            echo "Nothing found";
          }
          
          $output = '<select  name="procedure" class="form-control procedure"  data-name="procedure" id="code11"  data-type="select" >';
          
          $output .= '<option value="0"> Parent Category</option>';

          foreach($result as $row){
            $output .= '<option value="'.$row[id].'">'.$row[name].'</option>';
          }
          $output .= '</select>';
          echo $output; 
          
        ?> 
		</div>
		<input type="text" class="form-control" id="procedure" name="code" placeholder="Category Code" required>	
    <button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
	<div id="raaghx">A jax Away</div>
	<p id="raagh"> A jax Away</p>
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
						<div class="col-6 scrollable">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">Search</span>
									<input type="text" name="search_text_procedure" class="grid-100" id="search_text_procedure" placeholder="Search by Procedure" class="form-control" />
								</div> 

								</div>
							<div class="card-columns scrollable" id="treeview">
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
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
	var result_text ="addrecords here";
	var result_value =0;
	var treev =  fill_treeview();
	$('#procedure').click(function(){
		
		$('#recordModal').modal('show');
		$('#recordForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Procedure");
		$('#action').val('addRecord');
		$('#save').val('Add');
		
	});	

fill_treeview();
load_treeview_search();
 
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
					   /// dist/fetch.php
					   //../dental_includes/procedure_treeview.php
					   if (node.nodes == undefined) {
						   alert('Node Undefined');
					   // sends node info to another element
					   } else if (node.state.expanded) {
					   // TODO collapse children 
					   collapseNode(node.nodeId);
					   
					   }
						else if (node.nodes == 'LI') {
						   //alert('Node LI');
						}
						else if (node.state.selected){
													   
						  // alert("node selected"+ node.nodeId +": \n Node text:"+ node.text +": \n Node nodes:"+ node.id+": \n Node code:"+ node.code);
						   //onsole.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
						   //$('#result_query').html(node.id);
						   //window.result_query_data = node.id;
						   window.result_value = node.id;
						   window.result_text = node.text;
						   //alert("selected item value"+ window.result_value +": \n result_text:"+ window.result_text );
						   //onsole.log(' selected item value = ' + JSON.stringify(window.result_value) + ': result_text = ' + JSON.stringify(window.result_text));
						   //load_data(node.id);
						   load_values(window.result_value ,window.result_text);
						   //$('#code11').val(node.text);	
						   update_selected_procedure_id(window.result_value ,window.result_text);					   
						   
					   }

						else {
					   // TODO expand children 
					   //expandNode(node.nodeId);
					   
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

	   
	   
	   function collapseNode(nodeId) {
		   $('#treeview').treeview('collapseNode', [nodeId]);
		   alert("collapse " + nodeId);
	   }

	   function expandNode(nodeId) {
		   $('#treeview').treeview('expandNode', [nodeId]);
				   
		   alert("expand " + nodeId );
		   
	   }

	   function load_data(query)
	   {
		   $.ajax({
		   url:"dental_procedure_upgrades/dist/summaryProcTable.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
			   $('#result').html(data);
		   }
		   });
	   }
	   load_values(result_value ,result_text);
	   function load_values(result_value ,result_text)
	   {
		//$('#code11').val(result_text + ": value"+ result_value );
		$('#code11').val(result_value );
		$('#procedure').val(result_text);
		
	   }

	   $('#search_text_procedure').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				
				load_treeview_search(search);
			}
			else
			{
				load_treeview_search();
			}
		});

	   function load_treeview_search(query)
		{
			$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#treeview').treeview({
				   data:data,
				   multiSelect: false,
				   highlightSelected: true
				});
			}
			});
		}

		function update_selected_procedure_id(result_value ,result_text)
	{
			alert("div id:"+ result_text + "oyyy id:"+ result_value);
			var action = 'procedure_code_id';
			var  value = result_value;
			var valuex = '094040404';
			//dental_procedure_upgrades/dist/encypt_procedureid.php action:action,
			$.ajax({
				url:'testing.php',
				type:"POST",
				data:{procedure_code_id:value },				
				success: function(data){
					//console.log(data);
					//var simple = <?php	echo json_encode($outValue);?> ;
					//$('#type').html(data);
					alert("div id value :"+ data);
					//var gt = data.procedure_value_id;
					//$('#procedurex').val(data);
					//alert("div id value :"+ simple);
					$('#raagh').html(data);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
					//case error
				}
				

			});
		//return codex_id;
		//$('#'+ codex_id).$(this).val(result_text);
	}
}); 

</script>
