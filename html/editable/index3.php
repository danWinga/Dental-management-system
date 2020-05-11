<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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




<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


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
.scrollable{
  height: 100%;
  overflow-y: scroll;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
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
<h1>Create Treeview using Bootstrap Treeview Ajax JQuery with PHP</h1>  
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Ajax Dynamic Tree with jquery,xxxxx</b>
    </div>
    <div id="manual-ajax">second example</div>
    <div class="panel-body">
      <div class="cl-md-8" >
      
      <div class="modal">
        <p>Second AJAX Example!</p>
      </div>
      <!-- Trigger the modal with a button -->
<button type="button" id="test1" class="btn btn-success openBtn">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal with Dynamic Content</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--hhshhshhshshs -->


          <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
    <div class="col-6 scrollable">
      
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
          <div class="card-columns scrollable" id="treeview">
          </div>		
        
      
  </div>
      <a href="#" rel="modal:close">Close</a>
    </div>

    <!-- Link to open the modal -->
    <p><a href="#ex1" rel="modal:open">Open Modal</a></p>

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
          
          $output = '<select name="procedure" class="form-control procedure" onclick="ShowModalPopup()" data-name="procedure" id="procedure" data-type="select" >';
          
          $output .= '<option value="0"> Parent Category</option>';

          foreach($result as $row){
            $output .= '<option value="'.$row[id].'">'.$row[name].'</option>';
          }
          $output .= '</select>';
          echo $output; 
          
        ?> 
      </div>
      <div class="col-md-8" id="studentiew_treejson">
      </div>
    </div>
  </div>

  
</div>




<div class="container">


<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="col-6 scrollable">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
          <div class="card-columns scrollable" id="treeview">
          </div>		
        
      </div>
  </div>


  <!--hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh -->



<!---- dhdjdjdjdjdjfjdfdf ----->




  


</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

var btn = document.getElementById("procedurex");

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
</script>
</div>


</body>
</html>
<script type="text/javascript">
$(document).ready(function(){

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
							//window.result_query_data = node.id;
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


        var liveMemberData;
        $.ajax({
              type: "GET",
              url: "tree2.php",
              dataType: "json",
              success: function(response)
              {
                initTree(response)
              }
        });
        function initTree(liveMemberData) {
          $('#live_tree_json_view').treeview({data: liveMemberData});
        }

        function ShowModalPopup() {
        $find("#myModal").show();
        return false;
        }
        function HideModalPopup() {
            $find("#myModal").hide();
            return false;
        }


        $("#procedure").click(function(){
                   $.ajax({
                        url: "fetch.php",
                        dataType: "json"
                        success: function(returndata){
                              $('#myModal').modal('show');
                        }
                        
          });

          $('.openBtn').on('click',function(){
              $('.modal-body').load('fetch.php',function(){
                  $('#myModal').modal({show:true});
              });
         });


         $('#test1').click(function(event) {
          event.preventDefault();
          this.blur(); // Manually remove focus from clicked link.
          $.get(this.href, function(html) {
            $(html).appendTo('#myModal').modal();
          });
        });

         
        
    }); 

</script>