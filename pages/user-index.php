<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();

if ($_SESSION['logged_in'] != 'active') {
	header('Location: ./index.php');
}
// echo $_SESSION['id'];
$serverqur = "localhost";
$userqur = "root";
$password = "";
$db = "attendance";
// Create connection
$conn = mysqli_connect($serverqur, $userqur, $password, $db);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
require('./back.php');
?>
<!DOCTYPE html>
<html>

	<title>Home</title>
<body onload="logo()">

	<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #3b4237; width: 100%; margin: 0;">
		  <a class="navbar-brand" href="#" onClick="return false" onmousedown = "javascript:content('default');">
		  	<img src="../images/logo.jpg" id="logo" width="50" height="50" /> <span style="color: #ef8b00; font-weight: bold">Tech</span><span style="font-weight: bold">Zone</span>
		  </a>
		  <button class="navbar-toggler" style="color: white;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon" style="color: white;"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" id="aboutus" href="#" onClick="return false" onmousedown = "javascript:content('aboutus');">About Us <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" id="aboutus" href="./update.php">Change timetable <span class="sr-only">(current)</span></a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0" action="./signout.php">
		      <button class="mybtn btn btn-outline-danger my-sm-0" type="submit">logout</button>
		    </form>
		  </div>
	</nav><br>

	<center id="cen">
	</center>
	<center>
		<h1 id='c'></h1><br>
		<h1 id='s'></h1>
	</center>
	<center id='cen2'>
	</center>

	<div class="container" id="container">
		<table class="table table-bordered" id="tab_logic" >
		  <thead class="thead-light" >
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Time</th>
		      <th scope="col">Mon</th>
		      <th scope="col">Time</th>
		      <th scope="col">Tue</th>
		      <th scope="col">Time</th>
		      <th scope="col">Wed</th>
		      <th scope="col">Time</th>
		      <th scope="col">Thu</th>
		      <th scope="col">Time</th>
		      <th scope="col">Fri</th>
		    </tr>
		  </thead>
				<tbody>
				
					<tr id="addr0"></tr>
				</tbody>
				
			
			
		</table>
		<input type = "submit" value="submit" id='insert' name="insert" class="btn btn-outline-dark"> 
		<input type="button" class="btn btn-danger" value="Add row" id="add_row"  name=""> <small>Leave the boxes empty if not needed</small>
		
	</div>
	

	<?php
	
			// checks the size of result of particular userid from timetable table, if size is 0 performs insertion, if size is not 0 fetches data from table
			$output = '';
			$qur = 'SELECT * FROM timetable WHERE id= "'.$_SESSION["id"].'"';
			$result = mysqli_query($conn, $qur);
			$tmp = mysqli_fetch_array($result);
			// echo sizeof($tmp);
			if (sizeof($tmp) == 0) {
				echo "	
					<script type = \"text/javascript\">
					  
					   }
								var montime = [];	
								var mon = [];
								var tuetime = [];
								var tue = [];
								var wedtime = [];
								var wed = [];
								var thutime = [];
								var thu = [];
								var fritime = [];
								var fri = [];
				 
								$('.montime').each(function(){
									montime.push($(this).text());
								});
								$('.mon').each(function(){
								 mon.push($(this).text());
							 });
								$('.tuetime').each(function(){
								 tuetime.push($(this).text());
							 });
							 $('.tue').each(function(){
								 tue.push($(this).text());
							 });
							 $('.wedtime').each(function(){
								 wedtime.push($(this).text());
							 });
							 $('.wed').each(function(){
								 wed.push($(this).text());
							 });
							 $('.thutime').each(function(){
								 thutime.push($(this).text());
							 });
							 $('.thu').each(function(){
								 thu.push($(this).text());
							 });
							 $('.fritime').each(function(){
								 fritime.push($(this).text());
							 });
							 $('.fri').each(function(){
								 //console.log($(this).text());
								 fri.push($(this).text());
								 //console.log($(this).text());
							 });
				 
							 $.ajax({
								 url: \"content.php\",
								 method: \"POST\",
								 data:{montime:montime, mon:mon, tuetime:tuetime, tue:tue, wedtime:wedtime, wed:wed, thutime:thutime, thu:thu, fritime:fritime,fri:fri},
								 success:function(data){
									console.log(data);
									
								 }
								 
							 });
		            </script>
		            ";
			}
			else{
				echo "
								<style>
								#tab_logic{
									display: none;
								}
							</style>
							<script type = \"text/javascript\">
							$.ajax({
								url: \"fetch.php\",
								method: \"POST\",
								success: function(data)
								{
									$('#container').html(data);
									var montime = [];	
									var mon = [];
									var tuetime = [];
									var tue = [];
									var wedtime = [];
									var wed = [];
									var thutime = [];
									var thu = [];
									var fritime = [];
									var fri = [];
					 
									$('.montime').each(function(){
										montime.push($(this).text());
									});
									$('.mon').each(function(){
									 mon.push($(this).text());
								 });
									$('.tuetime').each(function(){
									 tuetime.push($(this).text());
								 });
								 $('.tue').each(function(){
									 tue.push($(this).text());
								 });
								 $('.wedtime').each(function(){
									 wedtime.push($(this).text());
								 });
								 $('.wed').each(function(){
									 wed.push($(this).text());
								 });
								 $('.thutime').each(function(){
									 thutime.push($(this).text());
									//  console.log($(this).text());
								 });
								 $('.thu').each(function(){
									 thu.push($(this).text());
								 });
								 $('.fritime').each(function(){
									 fritime.push($(this).text());
								 });
								 $('.fri').each(function(){
									 fri.push($(this).text());
									 //console.log($(this).text());
								 });
							}
							});
							
							</script>
				";
			}
	
?>
<script type='text/javascript'> 
	window.onload = function(){
		var montime = [];	
		var mon = [];
		var tuetime = [];
		var tue = [];
		var wedtime = [];
		var wed = [];
		var thutime = [];
		var thu = [];
		var fritime = [];
		var fri = [];
		$('.montime').each(function(){
			montime.push($(this).text());
		});
		$('.mon').each(function(){
			mon.push($(this).text());
		});
		$('.tuetime').each(function(){
			tuetime.push($(this).text());
		});
		$('.tue').each(function(){
			tue.push($(this).text());
		});
		$('.wedtime').each(function(){
			wedtime.push($(this).text());
		});
		$('.wed').each(function(){
			wed.push($(this).text());
		});
		$('.thutime').each(function(){
			thutime.push($(this).text());
		});
		$('.thu').each(function(){
			thu.push($(this).text());
		});
		$('.fritime').each(function(){
			fritime.push($(this).text());
		});
		$('.fri').each(function(){
			fri.push($(this).text());
			//console.log($(this).text());
		});
		function timec(){
			var a = new Date();
			var s;
			if(a.getDay() == 1){
				var tmp = montime;
				var tmpa = mon;
			}
			if(a.getDay() == 2){
				var tmp = tuetime;
				var tmpa = tue;
			}
			if(a.getDay() == 3){
				var tmp = wedtime;
				var tmpa = wed;
			}
			if(a.getDay() == 4){
				var tmp = thutime;
				var tmpa = thu;
			}
			if(a.getDay() == 5){
				var tmp = fritime;
				var tmpa = fri;
			}
			document.getElementById('c').textContent = tmp+tmpa;
			document.getElementById('c').style.display = "none";
			if(a.getHours()<10){
				s = '0'+a.getHours();
			}
			else{
				s = a.getHours();
			}
			if(a.getMinutes()<10){
				s += ':0'+a.getMinutes();
			}
			else{
				s += ':'+a.getMinutes();
			}
			if(a.getSeconds()<10){
				s += ':0'+a.getSeconds();
			}
			else{
				s+=':'+a.getSeconds();
			}
			s = s.toString();
			document.getElementById('s').textContent = s;
			document.getElementById('s').style.display = "none";
			tmp = tmp.map(String);
			// console.log(tmp);
			k = " "+s+" "; //this line made the notification feature successful
			// console.log(tmp.indexOf(k));
			var x = tmp.toString(); ////this line made the notification feature successful
			if(x.search(s)>0){
				document.getElementById('cen2').textContent = 'success';
				document.getElementById('cen2').style.display = "none";
				document.getElementById('cen').textContent = '';
				document.getElementById('cen').style.display = "none";
				if (Notification.permission === 'default') {
					alert('allow me')
				} else {
					notify = new Notification('You have '+ tmpa[tmp.indexOf(k)] + ' lecture.');
				}
				
			}
			else{
				document.getElementById('cen').textContent = 'fail';
				document.getElementById('cen').style.display = "none";
				document.getElementById('cen2').textContent = '';
				document.getElementById('cen2').style.display = "none";
			}
		}
		setInterval(timec, 1000);
	}
</script>
</body>
</html>