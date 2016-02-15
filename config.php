<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>Virtual Keyboard Basic Demo</title>

	<!-- demo -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">

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

	<link href="css/demo.css" rel="stylesheet">
		
	<!-- initialize keyboard (required) -->
	<script>
		$(function(){
			$('#keyboard').keyboard();
		});
	</script>

</head>
<body onload="getconfig();">
<Center>
<div class="container-fluid .center-block max-width: 100%;">
	<div class="row">
		<div class="col-xs-1  .center-block">
		<a href="/config.php" class="">
		  <img class="invert" src="./images/menu.png" alt="Menu" />
		</a>
		</div>
		<div class="col-xs-11  .center-block">
			<div class="product-img">
			   <img class="img-responsive img-fluid max-width: 100%;" src="./images/creatorbot_full.png" alt="CreatorBot 3D" />
			</div>
		</div>
	</div>
	<form class="form-vertical">
	<div class="form-group">
	  <div class="row">
		 <div class="col-xs-3 label control-label text-right">			
		 <label for="ssid" >SSID:</label>
		 </div>
		 <div class="col-xs-6">
			<div id="ssidlisting" > 

				<select id="ssid" class="form-control">
				<?php include 'netwifi.php';?>
				  <option value="HardCodedinConfig">None</option>
				</select>
			</div></div>
              <div class="col-xs-3 label"></div>
		</div>
	  <div class="row">
<div class="col-xs-3 label text-right" ><label for="keyboard" >wifi password:</label></div>
		  <div id="kbid" class="col-xs-6"> <!-- wrapper only needed to center the input -->
				<!-- keyboard input -->
				<input id="keyboard" type="text" class="form-control" >
			</div> <!-- End wrapper -->
		</div>
<div class="col-xs-3 label"></div> 
	</div>
	<div class="row"> 
		<div class="col-xs-12"> 
			<button type="submit" class="btn btn-primary">Add SSID & connect</button>
		</div>
	</div> 

        <div class="row">
		<div class="col-xs-2"></div>
                <div id="wifistatus" class="col-xs-8 left">
                </div>
		<div class="col-xs-2"></div>
        </div>

	</form>
</div>
</center> 
<script>

  $("#keyboard").prop('disabled', true);

function poll() {
    $.ajax({
        url: "netwifi-status.php",
        type: "GET",
        success: function(data) {
            console.log("polling"+data);
	    $('#wifistatus').html(data);
        },
        dataType: "poll",
        complete: setTimeout(function() {poll()}, 20000),
        timeout: 20000
    })
}  

function getconfig(){
  
  var seld = $('#ssid option:selected'); 
  var url='netwifi-json.php?wifi='+seld[0].value;
//  alert("url="+url + " s=" + seld[0].value );

  $.ajax({
    dataType: "json",
    url: url,
    success: function(result){
        $("#div1").html(JSON.stringify(result));
        //alert('data='+result.ssid);
        showkeyboard(result);
        }
	});

   poll(); 

    $.ajax({
        url: "netwifi-status.php",
        type: "GET",
        success: function(data) {
            console.log("polling"+data);
            $('#wifistatus').html(data);
        },
        dataType: "html",
        complete: setTimeout(function() {poll()}, 20000),
        timeout: 20000
    })


}
function showkeyboard(netwificonfig) {

if(netwificonfig.encryption){
  $("#keyboard").prop('disabled', false);
  }
else {
  $("#keyboard").prop('disabled', true);
  }
}
</script>

<script>
 $(document).on('change','#ssid',function(){
//    alert('Change Happened'+this.value);
    var url='netwifi-json.php?wifi='+this.value;
        $.ajax({
          dataType: "json",
          url: url,
          success: function(result){
                $("#div1").html(JSON.stringify(result));
                showkeyboard(result);
                if (result.encryption==true){
                        //alert("ENCRIPT true");
                }

        }
});

});
</script>

</body></html>
