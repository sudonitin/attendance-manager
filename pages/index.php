<?php

error_reporting(0);
ini_set('display_errors', 0);
session_start();
if ($_SESSION['logged_in'] == 'active') {
	header('Location: ./user-index.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$db = "attendance";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$name_err = $username_err =  "";

//sigup code
if (isset($_POST['signin'])) {
  //session_start();

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $conpass = mysqli_real_escape_string($conn, $_POST['confirm']);


     if(!empty(trim($_POST["name"]))){
          $first = test_input($name);
          if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
            $name_err = "Only letters and spaces are allowed";
          }
    }


    if (empty($name_err)) {
      $email_query = "SELECT * FROM users WHERE email = ?";

      if ($emailstmt = mysqli_prepare($conn, $email_query)) {
        mysqli_stmt_bind_param($emailstmt, 's', $email);
        mysqli_stmt_execute($emailstmt);
        $email_result = mysqli_stmt_get_result($emailstmt);
        $emailrow = mysqli_fetch_array($email_result, MYSQLI_BOTH);
        if ($emailrow['email'] == $email) {
          echo "
            <script type = \"text/javascript\">
              alert('Email is already registered.');
            </script>
            ";        
        }
        else{

        	$name_query = "SELECT * FROM users WHERE username = ?";

		      if ($namestmt = mysqli_prepare($conn, $name_query)) {
		        mysqli_stmt_bind_param($namestmt, 's', $name);
		        mysqli_stmt_execute($namestmt);

		        $name_result = mysqli_stmt_get_result($namestmt);
		        $namerow = mysqli_fetch_array($name_result, MYSQLI_BOTH);
		        if ($namerow['username'] == $name) {
		          echo "
		            <script type = \"text/javascript\">
		              alert('name is already registered.');
		            </script>
		            ";        
		        }
		        else{
		        	if ($pass == $conpass) {
			          $pass = md5($pass); //hashing 
			          $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)"; 
			          if ($stmt = mysqli_prepare($conn, $sql)) {
			            mysqli_stmt_bind_param($stmt, 'sss', $name,  $email, $pass);
			            mysqli_stmt_execute($stmt);
			            $_SESSION['logged_in'] = "active";
			            $_SESSION['email'] = $email;
									$_SESSION['username'] = $name;
									// $_SESSION['id'] = $row['usrid'];
									echo "<script type = \"text/javascript\">alert('welcome, u have successfully registered..!!');</script>";            
									header("location: ./user-index.php");
								}
								$id_query = "SELECT * FROM users WHERE username = ?";

								if ($idstmt = mysqli_prepare($conn, $id_query)) {
									mysqli_stmt_bind_param($idstmt, 's', $name);
									mysqli_stmt_execute($idstmt);
									$id_result = mysqli_stmt_get_result($idstmt);
									$idrow = mysqli_fetch_array($id_result, MYSQLI_BOTH);
									$_SESSION['id'] = $idrow['usrid'];
											mysqli_stmt_close($stmt);
										}
						}
			          else{
			            echo "<script type = \"text/javascript\">alert('passwords did not match.');</script>";  
			            }
		        }
		    }
		}
     }
      
    }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//login code
if (isset($_POST['login'])) {
    # code...
    $email = mysqli_real_escape_string($conn, $_POST["logemail"]);
    $user_password = mysqli_real_escape_string($conn, $_POST["logpassword"]);
    $user_password = md5($user_password);

    $sql = "SELECT * FROM users WHERE username = ? and password = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
      # code...
      mysqli_stmt_bind_param($stmt, 'ss', $email, $user_password );
      
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_array($result, MYSQLI_BOTH);
      if ($row['username'] == $email && $row['password'] == $user_password) {
        # code...
				$_SESSION['logged_in'] = "active";
				$_SESSION['username'] = $email;
				$_SESSION['id'] = $row['usrid'];
        // $_SESSION['uid'] = $row['uid'];
        #echo $_SESSION['logged_in'];
        // header("location: ./user-index.php");
				 echo "<script type = \"text/javascript\">alert('login successful');</script>";
				 header("location: ./user-index.php");
      }
      else{
        echo "<script type = \"text/javascript\">alert('wrong username or password.');</script>";
      }
        
        }
      
  }

  require('./back.php');
?>


<!DOCTYPE html>
<html>
	<title>TechZone</title>
		
	
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
		        <a class="nav-link" id="aboutus" href="#">About Us <span class="sr-only">(current)</span></a>
		      </li>
		    </ul>
		   
		  </div>
	</nav>
<br>
	<div class="container" id="content">
		<h2 style="font-size: 3vw;" id="sub-head">Use the attendance manager now!</h2>
		<p class="content">This website helps you maintainig you attendance according to the criteria you mention.</p><hr>
		<h3 class="head-content" style="font-size: 3vw;">How to use?</h3>
		<ul class="content">
			<li>Add each subject</li>
			<li>Add day wise time table</li>
			<li>Check if attended lecture</li>
			<li>Press calculate button to kow how much percentage you have attended</li>
		</ul><hr>
		<h3 style="font-size: 3vw;" class="head-content">Here is a demonstration</h3><hr>
		<h3 class="head-content" style="font-size: 3vw;">Create an account now or Login</h3>
		<p class="content">Use the free service to whitelist your name from defaulter's list.<br><button data-toggle="modal" data-target="#loginForm" class="my-btn-anim">Login</button> <button data-toggle="modal" data-target="#signupForm" class="my-btn-anim2">Signup</button></p><hr>
		<i class="content">PS: This is just a manager. You have to attend lectures for saving yourself from defaulter list</i>😂😂😂

		<!-- Modal login -->
		<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="loginFormTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		          <div class="form-group">
		            <label for="username" class="col-form-label" style="color: grey;">Username:</label>
		            <input type="text" class="form-control" id="username1" name="logemail">
		          </div>
		          <div class="form-group">
		            <label for="password" class="col-form-label" style="color: grey;">Password:</label>
		            <input class="form-control" type="password" id="password1" name="logpassword" />
		          </div>
		          <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button class="btn btn-primary" type="submit" name="login">Login</button>
			      </div>
		        </form>
					
		      </div>
		      
		    </div>
		  </div>
		</div>

		<!-- Modal sign up< -->
		<div class="modal fade" id="signupForm" tabindex="-1" role="dialog" aria-labelledby="signupFormTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Signup</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		          <div class="form-group">
		            <label for="username" class="col-form-label" style="color: grey;">Username:</label>
		            <input type="text" class="form-control" id="username" name="name" required>
		          </div>
		          <div class="form-group">
		            <label for="email" class="col-form-label" style="color: grey;">Email id:</label>
		            <input type="email" class="form-control" id="email" name="email" required>
		          </div>
		          <div class="form-group">
		            <label for="password" class="col-form-label" style="color: grey;">Password:</label>
		            <input class="form-control" type="password" id="password" name="password" required></input>
		          </div>
		          <div class="form-group">
		            <label for="password" class="col-form-label" style="color: grey;">Confirm Password:</label>
		            <input class="form-control" type="password" id="password1" name="confirm" required></input>
		          </div>
		          <!-- <button type="submit" class="btn btn-primary" name="signin">Signup</button> -->
		          <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name="signin">Signup</button>
			      </div>
		        </form>

		      </div>
		      
		    </div>
		  </div>
		</div>
		
	</div>
<br><br><br><br><br>
	<footer class="footer" style="text-align: center; color: white; background-color: #3b4237; padding-top: 2%; padding-bottom: 2%;">
		Copyright 2019 <a href="https://github.com/globefire">@TechZone</a>
	</footer>
</body> 
</html>