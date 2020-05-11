<html>
<head>
  <script src="jquery/jquery-1.11.2.min.js"></script>
  <script src="jquery/ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery/ui/jquery-ui.min.css">
<style>
#demo-modal {
	text-align: center;
	padding: 20px;
}

#demo-modal-target {
	background: url(modal_bg.jpg) no-repeat top left fixed;
	font-family: calibri;
	max-width: 550px;
	text-align: center;
	color: #FFF;
	padding: 70px 0px;
}

.demo-title {
	font-size: 2em;
	padding: 40px;
}

.btn-modal-target {
	padding: 10px 20px;
	color: #F0F0F0;
	margin: 5px;
	border-radius: 15px;
	cursor: pointer;
	width: 70px;
	display: inline-block;
}

#btn-jquery {
	background: #e85545;
}

#btn-bootstrap {
	background: #43cb83;
}

#btn-responsive {
	background: #ff9e8f;
}

.modal-text {
	margin-top: 15px;
	line-height: 25px;
	font-size: 1.0em;
    font-family: calibri;
}
</style>
<title>Modal</title>
</head>
<body>
	<div id="demo-modal-target">
		<div class="demo-title">Demo Open Modal Window</div>
		<div onclick="loadDynamicContentModal('jquery')"
			class="btn-modal-target" id="btn-jquery">jQuery</div>
		<div onclick="loadDynamicContentModal('bootstrap')"
			class="btn-modal-target" id="btn-bootstrap">Bootstrap</div>
		<div onclick="loadDynamicContentModal('responsive')"
			class="btn-modal-target" id="btn-responsive">Responsive</div>
	</div>
	<div id="demo-modal"></div>
	<script>
function loadDynamicContentModal(modal){
	var options = {
			modal: true,
			height:300,
			width:500
		};
    $('#demo-modal').html("<img src='LoaderIcon.gif' />");
	$('#demo-modal').load('get-dynamic-content.php?modal='+modal).dialog(options).dialog('open');
}
</script>
</body>
</html>
