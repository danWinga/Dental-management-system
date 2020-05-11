$( document ).ready(function() {
  $('#editableTable').SetEditable({
	  columnsEd: "0,1,2,3,4,5,6,7,8,9,10,11,13",
	  onEdit: function(columnsEd) {
		  console.log("===edit=="+(this));
		var empId = columnsEd[0].childNodes[1].innerHTML;
        var empName = columnsEd[0].childNodes[3].innerHTML;
        var gender = columnsEd[0].childNodes[5].innerHTML;
        var age = columnsEd[0].childNodes[11].innerHTML;
        var skills = columnsEd[0].childNodes[9].innerHTML;
		var address = columnsEd[0].childNodes[7].innerHTML;
		var destination = columnsEd[0].childNodes[13].innerHTML;
		alert(empId+ "\t neme: "+ empName  + "\t gender:"+ gender + "\t age:"+ age + "\t skills:"+ skills + "\t addres:"+ address + "\t destin:"+ destination );
		$.ajax({
			type: 'POST',			
			url : "action.php",	
			dataType: "json",					
			data: {id:empId, name:empName, gender:gender, age:age, skills:skills, address:address,destination:destination, action:'updateRecord'},			
			success: function (response) {
				if(response.status) {
					// show update message
				}						
			}
		});
	  },
	  onBeforeDelete: function(columnsEd) {
	  var empId = columnsEd[0].childNodes[1].innerHTML;
	  $.ajax({
			type: 'POST',			
			url : "action.php",
			dataType: "json",					
			data: {id:empId, action:'delete'},			
			success: function (response) {
				if(response.status) {
					// show delete message
				}			
			}
		});
	  },
	});
});