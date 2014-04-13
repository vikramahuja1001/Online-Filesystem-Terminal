$('#senddiv').ready().hide();
$('#logout').ready().hide();

function search() {




	//	var username = $('#username_email').val();
	//$.post('search.php', { username:username },{ } );
	var username = document.getElementById("username_email").value;  
	var xhr;  
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
		xhr = new XMLHttpRequest();  
	} else if (window.ActiveXObject) { // IE 8 and older  
		xhr = new ActiveXObject("Microsoft.XMLHTTP");  
	}  
	var data = "email_username=" + username; 
	xhr.open("POST", "search.php", true);   
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
	xhr.send(data);  
	//var text='7';
	xhr.onreadystatechange = display_data;
	function display_data() {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				var text=xhr.responseText;
				document.getElementById("message").innerHTML = xhr.responseText;
				if(text.length == 1)
				{
					$('#senddiv').show();
					$('#logout').show();
					$('#search').hide();
				}
			} else {
				alert('There was a problem with the request.');
			}
		}
	}
	//	console.log(text);


	//	$('#senddiv').show();
	//	$('#logout').show();
	//	$('#search').hide();

}

function logout() {
	$.post('signout.php');
	$('#search').show();
	$('#logout').hide();
	$('#senddiv').hide();
}
