<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>Virtual Keyboard Basic Demo</title>

	<!-- demo -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/demo.css" rel="stylesheet">

	<!-- jQuery & jQuery UI + theme (required) -->
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- keyboard widget css & script (required) -->
	<link href="css/keyboard.css" rel="stylesheet">
	<script src="js/jquery.keyboard.js"></script>

	<!-- keyboard extensions (optional) -->
	<script src="js/jquery.mousewheel.js"></script>
	<!--
	<script src="../js/jquery.keyboard.extension-typing.js"></script>
	<script src="../js/jquery.keyboard.extension-autocomplete.js"></script>
	-->

	<!-- initialize keyboard (required) -->
	<script>
		$(function(){
			$('#keyboard').keyboard();
		});
	</script>
	<style>
	body{
		background-color: #03ffff;
	}
	</style>
</head>
<body>
<Center>
<div class="container-fluid .center-block max-width: 100%;">
	<div class="row">
		<div class="col-xs-12  .center-block">
			<div class="product-img">
			   <img class="img-responsive img-fluid max-width: 100%;" src="./images/creatorbot_full.png" alt="CreatorBot 3D" />
			</div>
		</div>
	</div>
	<form class="form-vertical">
	<div class="form-group">
	  <div class="row">
		 <div class="col-xs-12">
			<div id="ssidlisting" class="large"  > 
				<select>
				<?php
					include 'wifi.php';
					foreach($newssid as $key => $value){ ?>
                    <option value="<?php echo $value; ?>"><?php echo $value['profile']; ?></option> 
				<?php } ?>
				  <option value="dlink">dlink</option>
				  <option value="Password">WPA Pwd Protected    </option>
				  <option value="OakHill">Oakhill</option>
				  <option value="">None</option>
				</select>
			</div></div>
		</div>
	  <div class="row">
		  <div id="col-xs-12"> <!-- wrapper only needed to center the input -->
				<!-- keyboard input -->
				<input id="keyboard" type="text" class="large" >
			</div> <!-- End wrapper -->
		</div>
	</div>
	</form>
</div></body></html>