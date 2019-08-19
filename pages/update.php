<?php
require("back.php");
error_reporting(0);
ini_set('display_errors', 0);
session_start();
if ($_SESSION['tt']!='inserted' && $_SESSION['logged_in'] == 'active') {
    echo "
    <script type = \"text/javascript\">
    alert('No timetable found');
    window.location.href = '/attendance/pages/user-index.php';
    </script>
    ";
    
}
?>
<!DOCTYPE html>
<html>
	<title>Change Timetable</title>
	<!-- 1 fetch the timetable DONE -->
    <!-- 2 make the table editable DONE-->
    <!-- 3 provide submit button to execute update table DONE-->
    <!-- 4 reload to user-index after submission DONE-->
    <!-- 5 add row functionality DONE-->
    <body onload="logo()">

	<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #3b4237; width: 100%; margin: 0;">
		  <a class="navbar-brand" href="./user-index.php">
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
		        <a class="nav-link" style="color: #ef8b00;font-weight: bold;" id="aboutus" href="./update.php">Change timetable <span class="sr-only">(current)</span></a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0" action="./signout.php">
		      <button class="mybtn btn btn-outline-danger my-sm-0" type="submit">logout</button>
		    </form>
		  </div>
	</nav><br>
    
    <div class="container" id="container">
		
        <?php
            echo "
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
        ?>
	</div>
    <script type='text/javascript' src='../js/update.js'></script>
    </body>
</html>