 function postRequest(strURL) {
	var xmlHttp;    
	if (window.XMLHttpRequest) { 
		// Mozilla, Safari, ...        
		var xmlHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) { 
		// IE        
		var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlHttp.open('POST', strURL, true);

    xmlHttp.setRequestHeader('Content-Type', 
         'application/x-www-form-urlencoded');

    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            updatepage(xmlHttp.responseText);
        }
    }

    xmlHttp.send(strURL);
}

function updatepage(str){	
	console.log('I am here');		
    document.getElementById("result").innerHTML = "<font color='red' size='5'>" + str + "</font>";
}

function time(){	
	var rnd = Math.random();
	var url="time.php?id="+rnd;
	postRequest(url);	
}	
        
function showCurrentTime(){
	setInterval(time, 1000);
}
