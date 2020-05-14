<div class="insert-post-ads1" style="margin-top:20px;">
</div>
</div>
</body>
</html>
<script type="text/javascript">
$('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm'] // xs, sm, md, lg
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		
		fill_parent_category();
		fillType();
		fill_all_teeth();
		fill_list();
		fill_treeview();
		load_data();
		
		
		$('#treeview_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"dental_procedure_upgrades/dist/add.php",
				method: "POST",
				data: $(this).serialize(),
				success: function(data){
					fillType();
					fill_list();
					fill_all_teeth()
					fill_parent_category();
					fill_treeview();					
					$('#treeview_form')[0].reset();
					alert(data)
				}
			})

		});
		

        $('#addProcedure').click(function(){
			$('#addTreeModal').modal('show');
			$('#treeview_form')[0].reset();
			$('#action').val('addRecord');
			$('#save').val('Add');
		});
		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
			load_data(search);
			}
			else
			{
			load_data();
			}
		});
	

	});

	function fill_treeview()
		{
			$.ajax({
				 method: "POST",  
				  url: "dental_procedure_upgrades/dist/fetch.php",   
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
								//alert('Node Undefined');
							// sends node info to another element
							} else if (node.state.expanded) {
							// TODO collapse children 
							//collapseNode(node.nodeId);
							
							}
							 else if (node.nodes == 'LI') {
								//alert('Node LI');
							 }
							 else if (node.state.selected){
															
								//alert("node selected"+ node.nodeId +": \n Node text:"+ node.text +": \n Node nodes:"+ node.id+": \n Node code:"+ node.code);
								//onsole.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
								//$('#recordSummaryModal').modal('show');
								load_data(node.id);
								
								
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
				

		function fill_parent_category()
		{
			$.ajax({

				url:'dental_procedure_upgrades/dist/fill_parent_category.php',
				success: function(data){
					$('#parent_category_id').html(data);
					fill_treeview();
				}

			})
		}

		function fillType()
		{
			var action = 'fillType';
			$.ajax({
				
				url:'dental_procedure_upgrades/dist/fillType.php',
				method:"POST",
				data:{action:action},
				success: function(data){
					$('#type').html(data);
				}

			})
		}

		function fill_list()
		{
			var action = 'fillType';
			$.ajax({
				
				url:'dental_procedure_upgrades/dist/fill_listed.php',
				method:"POST",
				data:{action:action},
				success: function(data){
					$('#listed').html(data);
				}

			})
		}

		

		function fill_all_teeth()
		{
			var action = 'fillAllTeeth';
			$.ajax({
				url:'dental_procedure_upgrades/dist/fillTeeth.php',
				method:"POST",
				data:{action:action},
				success: function(data){
					$('#all_teeth').html(data);
				}	

			})
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
	
	
</script>
