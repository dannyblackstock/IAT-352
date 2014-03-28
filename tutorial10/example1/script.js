

function load(){		
	setTimeout(loadXMLDoc,5000);
}

function loadXMLDoc(){			
	var xmlhttp;
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else {	
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function() {		
		if (xmlhttp.readyState==4 && xmlhttp.status==200){			
			document.getElementById("content").innerHTML+=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","info_ajax.txt",true);	
	xmlhttp.send();
	
	//document.getElementById("content").innerHTML+=xmlhttp.responseText;
}

function updateLabel(msg)
{
	var msgArea = document.getElementById('lblMessage');
	msgArea.text = msg.value;
}