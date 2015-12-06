$(document).ready(function(){
/*When a user clicks on a button, it's either going to be to
see who is all logged in, log in a visitor, or log out a visitor.
Eventually they will be able to see who was the last visitor 
to log in. The functions to handle these tasks are below. They
call to the specific controllers based on the user requests*/

//the whoIn function calls the whoIn.php controller to generate
//a list of who is logged in
			whoIn = function() {
					var isIn = document.getElementById("who").value;
					//console.log(isIn);
					var xmlhttp = new XMLHttpRequest();
        		
					//this function is quede until require info is fetch
					//once data is available from server it is written to the html
					xmlhttp.onreadystatechange = function() {		
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           		document.getElementById("testInfo").innerHTML = xmlhttp.responseText;
							$("#testInfo").show();
							setTimeout(function() { $("#testInfo").hide(); }, 7000);
            }
        	};
			
					//this code opens a connection to a server and 
					//gets a controller file whoin.php, while sending data with it. it process data
					//and it's results is stored in responseText
		      xmlhttp.open('GET', "html/controllers/whoin.php?whoIn=" + isIn, true);
        	xmlhttp.send();
				}		
	
	
//the loadDoc function calls accepts a controller path as
//an argument, because this function calls the 
//a controller to either handle a log in or a log out	
			loadDoc = function(pathToController) {
						var vfname = document.log.vfname.value;
						var vlname = document.log.vlname.value;
						var fvisiting  = document.log.fvisiting.value;
						var lvisiting  = document.log.lvisiting.value;
						//document.getElementById("testInfo").innerHTML = "hello";   	
						var xmlhttp = new XMLHttpRequest();
        		
						//this function is quede until require info is fetch
						//once data is available from server it is written to the html
						xmlhttp.onreadystatechange = function() {		
            	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           			document.getElementById("testInfo").innerHTML = xmlhttp.responseText;
								$("#testInfo").show();
								setTimeout(function() { $("#testInfo").hide(); }, 7000);
								$( '#inmateInfo' ).hide();
								$( '#logIn' ).hide();
								$( '#logout' ).hide();
								$('#submitVis').show();
								document.forms['log'].reset();
								//console.log(xmlhttp.responseText);
            	}
        		};
			
						//this code opens a connection to a server and 
						//gets a file testInfo.php. testInfo will process data
						//and it's results is stored in responseText
						xmlhttp.open("GET", pathToController + "?vfname=" + vfname + "&vlname=" + vlname + "&fvisiting=" + fvisiting + "&lvisiting=" + lvisiting, true);
        		xmlhttp.send();
		}		
});	