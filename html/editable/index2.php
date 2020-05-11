<!DOCTYPE html>
<html>
<head>
    <title>jQuery Ajax X-editable bootstrap plugin to update records in PHP Example</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    
   
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
 
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>


  <style>
/* The Modal (background) */
.modalx {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>


<div class="container">
    <h3>jQuery Ajax X-editable bootstrap plugin to update records in PHP Example</h3>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th width="100px">Action</th>
        </tr>


        <?php
        require('inc/db_connect.php');


        $sql = "SELECT * FROM developers";
        $users = $conn->query($sql);


        while($user = $users->fetch_assoc()){
        ?>
            <tr>
                <td><a href="" class="update" data-name="name" data-type="text" data-pk="<?php echo $user['id'] ?>" data-title="Enter name"><?php echo $user['name'] ?></a></td>
                <td><a href="" class="update" data-name="email" data-type="email" data-pk="<?php echo $user['id'] ?>" data-title="Enter email"><?php echo $user['gender'] ?></a></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
            </tr>
            
        <?php } ?>
    </table>
    <div> 
    <input class="form-control edit" data-type="select" data-name="name2" id="name2" data-type="text" data-pk="24" data-title="Enter Procedure"><?php echo $_GET['namex'] ?></input>
    <select name="procedure" onclick="openForm()" class="form-control procedure" data-name="procedure" id="procedure" data-type="select" ><option></option></select>
    </div>



    <h2>Modal Example</h2>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Open Modal</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
        <div class="col-md-12">
			<h3 align="center"><u> Category Tree</u></h3>
            <br />
		<div id="treeview">
		</div>
			
		</div>
    </div>

    </div>

     <!-- container / end -->

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Create Dynamic Treeview Example with PHP MySQL - ItSolutionStuff.com</h1>
    </div>
    <div class="panel-body">
      <!-- <div class="col-md-8" id="treeview_json"> -->
      </div>
    </div>
  </div>


  <div class="row">

            

            <div class="col-sm-8">
                <!-- here goes other page contents -->

                <h2>Popup Form</h2>
<p>Click on the button at the bottom of this page to open the login form.</p>
<p>Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.</p>

<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
<div class="col-md-6">
			<h3 align="center"><u> Category Tree</u></h3>
            <br />
		<div id="treeview">
		</div>
        <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
			
		</div>
</div>






  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
                <!-- end --->
            </div>
        </div>



        <div id="action_alert" title="Action">

        <div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Enter First Name</label>
					<input type="text" name="first_name" id="first_name" class="form-control" />
					<span id="error_first_name" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Last Name</label>
					<input type="text" name="last_name" id="last_name" class="form-control" />
					<span id="error_last_name" class="text-danger"></span>
				</div>
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>






</div>


</body>
</html>
<script type="text/javascript">
$(document).ready(function(){

    $.ajax({
            url: 'tree2.php',
            method: 'GET',
            dataType: 'json',
            success: function(data){
                $('#myTree').treeview({data: data});
            }
        });

    $('.update').editable({
           url: 'update.php',
           type: 'text',
           pk: 1,
           name: 'name',
           title: 'Enter name'
    });
    

    $('.edit').editable({
        
        url: "update.php",
        title: 'Gender',
        type: "POST",
        dataType: 'json',
        source: [{value: "1Male", text: "Male"}, {value: "2Female", text: "Female"}],
        validate: function(value){
        if($.trim(value) == '')
            {
                return 'This field is required';
            }
            alert(value );
            //alert(text);
            //$('#name2').val(value);
            $('#name2').val(value);
        }
    });

    function getSource() {
        var url = "fetch.php";
        return $.ajax({
            type:  'GET',
            async: true,
            url:   url,
            dataType: "json"
        });
    }

    function getSource2() {
        var url = "fetch.php";
        return $.ajax({
            type: "GET",  
		    dataType: "json",  
			async: true,
            url:   url,
            dataType: "json",
            success: function(data){
                $('#procedure2').treeview({
					data:data,
					multiSelect: false,
					highlightSelected: true,

            });
        }
        });
    }

    getSource2().done(function(result) {

        $('.procedure2').editable({
            type: 'select',
            title: 'Select status',
             value:3,
            source: result
            /*
             //uncomment these lines to send data on server
             ,pk: 1
             ,url: '/post'
             */
        });


    }).fail(function() {
        alert("Error with payment status function!")
    });


    fill_treeview();
 

    $('.procedurexx').editable({
        url: "fetch.php",
        title: 'procedure',
        type: 'POST',
        dataType: 'json',
        source: [   {value: "1Male", text: "Male"}, 
                    {value: "2Female", text: "Female"}],
        validate: function(value){
        if($.trim(value) == '')
            {
                return 'This field is required';
            }
            alert(value );
            //alert(text);
            //$('#name2').val(value);
            $('#procedure').val(value);
        }
    });
        

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
														
							alert("node selected"+ node.nodeId +": \n Node text:"+ node.text +": \n Node nodes:"+ node.id+": \n Node code:"+ node.code);
							onsole.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
							//$('#result_query').html(node.id);
							window.result_query_data = node.id;
							//load_data(node.id);
							
							
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
        
        var treeData;
   
        $.ajax({
                type: "GET",  
                url: "tree.php",
                dataType: "json",       
                success: function(response)  
                {
                initTree(response)
                }   
        });
        
        function initTree(treeData) {
            $('#treeview_json').treeview({
                data: treeData,
                multiSelect: false,
				highlightSelected: true,
				onNodeSelected: function(event, node) {
                    if (node.nodes == undefined) {
                            alert('Node Undefined' + node.nodes);
                            //onsole.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
						
                    }
                    else if (node.state.selected){
					   // alert("node selected"+ node.nodeId +": \n Node text:"+ node.text +": \n Node nodes:"+ node.id+": \n Node code:"+ node.code);
                         onsole.log('node selected = ' + JSON.stringify(event) + '; data = ' + JSON.stringify(data));
                         //$('#result_query').html(node.id);
                         //window.result_query_data = node.id;
                         //load_data(node.id);
                      }

                }
            });
        }
        
        $('#action_alert').dialog({
            autoOpen:false
        });


        //appends an "active" class to .popup and .popup-content when the "Open" button is clicked
        $(".open").on("click", function() {
            $(".popup-overlay, .popup-content").addClass("active");
        });

        //removes the "active" class to .popup and .popup-content when the "Close" button is clicked 
        $(".close, .popup-overlay").on("click", function() {
             $(".popup-overlay, .popup-content").removeClass("active");
        });
    }); 

</script>


