function logo(){
	if (screen.width > 1024) {
		document.getElementById('logo').width = 40;
		document.getElementById('logo').height = 40;
	}
	else{
		document.getElementById('logo').width = 100;
		document.getElementById('logo').height = 100;
	}
}

function content(cv){
	//$("")
	var url = 'content.php';
	$.post(url, {contentVar: cv}, function(data) {
		$("#content").html(data).show();
	});
}