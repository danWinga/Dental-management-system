$(document).ready(function(){
	$.datepicker.setDefaults({  
		dateFormat: 'yy-mm-dd'   
	 }); 				  
	
	fill_parent_category();
	fillType();
	fill_all_teeth();
	fill_list();
	fill_treeview();
	load_data();		
	var result_query_data = '';
	
	
	$('#treeview_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"dental_procedure_upgradesdist/add.php",
			method: "POST",
			data: $(this).serialize(),
			success: function(data){
				fillType();
				fill_list();
				fill_all_teeth();
				fill_parent_category();
				fill_treeview();					
				$('#treeview_form')[0].reset();
				alert(data);
			}
		})

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

	fetch_data('no');
	fetch_both('no','','' ,0);
	
	$("#search").on('click', function(){
	//$('#search').click(function(){
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		var res_query = "";
		
		var res_query = parseInt(window.result_query_data, 10); 

		if(start_date != '' && end_date !='' && isNaN(res_query) )
		{
							
			fetch_data('yes', start_date, end_date);
		}
		
		else if(start_date != '' && end_date !='' && parseInt(res_query) > 0)
		{
			
			fetch_both('yes', start_date , end_date , res_query);

		}		
		else
		{
			alert("Both Date is Required");
			//load_data();
		}
	});
		
	$('.responsive-tabs').responsiveTabs({
		accordionOn: ['xs', 'sm'] // xs, sm, md, lg
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
						collapseNode(node.nodeId);
						
						}
						 else if (node.nodes == 'LI') {
							//alert('Node LI');
						 }
						 else if (node.state.selected){
														
							//alert("node selected"+ node.nodeId +": \n Node text:"+ node.text +": \n Node nodes:"+ node.id+": \n Node code:"+ node.code);
							//onsole.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
							//$('#result_query').html(node.id);
							window.result_query_data = node.id;
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

	function fetch_data(is_date_search, start_date='', end_date='')
	{
		$.ajax({
		url:"dental_procedure_upgrades/dist/summaryProcTable.php",
		method:"POST",
		data:{
			is_date_search:is_date_search, start_date:start_date, end_date:end_date
			},
		success:function(data)
		{
			$('#result').html(data);
		}
		});
	}

	function fetch_both(is_date_search, start_date='', end_date='' , myId =0)
	{
		$.ajax({
		url:"dental_procedure_upgrades/dist/summaryProcTable.php",
		method:"POST",
		data:{
			is_date_search:is_date_search, start_date:start_date, end_date:end_date, myId:myId},
		success:function(data)
		{
			$('#result').html(data);
		}
		});
	}


