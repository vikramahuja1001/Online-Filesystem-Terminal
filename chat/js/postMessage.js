function sendMessage() {
	//var message = $('#message').val();
	var message = document.getElementById("message").value;	
	var sender_id =1
	var xhr;
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
		xhr = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 8 and older  
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var data = "message="+message & "sender_id="+sender_id ;
	//xhr.send('user=person&pwd=password&organization=place&requiredkey=key');
//	var data = new FormData();
//	data.append('message', message);
//	data.append('sender_id', '1');
//	data.append('reciever_id', '2');
	console.log(data);
//	var data = "email_username=" + username;
//	xhr.open("POST", "search.php", true);
//	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//	xhr.send(data);





	//	$.post('postMessage.php', { message: message } , function() { } );

}
