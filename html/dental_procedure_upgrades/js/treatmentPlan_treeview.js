$(document).ready(function(){

	$('#tst').click(function(event) {
		event.preventDefault();
		this.blur(); // Manually remove focus from clicked link.
		$.get(this.href, function(html) {
			$(html).appendTo('#manual-ajax').modal();
		});
	});
	
	var result_text ="addrecords here";
	var result_value =0;
	var treev =  fill_treeview();
	$('#procedure').click(function(){
		var tree = 
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
		   url:"/dental_procedure_upgrades/dist/summaryProcTable.php",
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
}); 
