$(document).ready(function(){	
	
	var dataRecords = $('#recordListing').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"dental_procedure_upgrades/ajax_action.php",
			type:"POST",
			data:{action:'listRecords'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 6, 7],
				"orderable":false,
			},
		],
		"pageLength": 10 
	});	
	
	$('#addRecord').click(function(){
		$('#recordModal').modal('show');
		$('#recordForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Record");
		$('#action').val('addRecord');
		$('#save').val('Add');
	});		
	$("#recordListing").on('click', '.update', function(){
		var id = $(this).attr("id");
		var action = 'getRecord';
		$.ajax({
			url:'dental_procedure_upgrades/ajax_action.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){
				
				$('#recordModal').modal('show');
				$('#id').val(data.id);
				$('#name').val(data.name);
				$('#all_teeth').val(data.all_teeth);
				$('#cost').val(data.cost);				
				$('#type').val(data.type);
				$('#listed').val(data.listed);
				$('#code').val(data.code);
				$('#parent_category_id').val(data.parent_category_id);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Records");
				$('#action').val('updateRecord');
				$('#save').val('Save');
			}
		})
	});
	
	
	//fill_type_option()
	
	
	function selectAll_Teethxxx(){

		$('#all_teeth').on('change', function(event){
			event.preventDefault();
			//$('#all_teeth').attr('selected','selected');
			var teethOption= $(this).serialize();
			$.ajax({
				data:teethOption,
				success: function(data){
										
					var rs = $('#all_teeth').val();
					//alert(data.all_teeth)
					$('#restd').html("<b> result:</b>" + rs);
				}
			})
	
		});
		
	}
	
	//selectAll_Teeth();
	function fill_typexx()
		{
			//var id = $(this).attr("id");
			var action = 'fillType';
			$.ajax({
				url:'dental_procedure_upgrades/ajax_action.php',
				method:"POST",
				data:{action:action},
				
				success: function(data){
					$('#type').html(data);
				}

			})
	}
	//fill_type();

	

	$("#recordModal").on('submit','#recordForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"dental_procedure_upgrades/ajax_action.php",
			method:"POST",
			data:formData,
			success:function(data){
					
				$('#recordForm')[0].reset();
				$('#recordModal').modal('hide');				
				$('#save').attr('disabled', false);
				dataRecords.ajax.reload();
			}
		})
	});		
	$("#recordListing").on('click', '.delete', function(){
		var id = $(this).attr("id");		
		var action = "deleteRecord";
		if(confirm("Are you sure you want to delete this record?")) {
			$.ajax({
				url:"dental_procedure_upgrades/ajax_action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data) {					
					dataRecords.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	var dataRecordsSummary = $("#recordSummery").DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"dental_procedure_upgrades/ajax_action.php",
			type:"POST",
			data:{action:'listProcedureSummery'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 6, 7],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	
		
	
});