//this javascript allows fields to be displayed and/or hidden
//based on user selections
$(document).ready(function(){
	$( '#inmateInfo' ).hide();
	$( '#logIn' ).hide();
	$( '#logout' ).hide();
	$( '#submitVis' ).click(function() {
		if (document.log.vfname.value == "" || document.log.vlname.value == "") {
				document.getElementById("testInfo").innerHTML = "Please fill out all required fields!";
				$("#testInfo").show();
				setTimeout(function() { $("#testInfo").hide(); }, 7000);
		} else {
			$('#submitVis').hide();
			$( '#inmateInfo' ).show();
			$('#logIn').show();
			$('#logout').show();
		}
	});
});