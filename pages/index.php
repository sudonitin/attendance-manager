<?php

session_start();

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
  # code...
  //session_start();

  // echo "hello world"; 

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  #$num = mysqli_real_escape_string($conn, $_POST['contact_no']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $conpass = mysqli_real_escape_string($conn, $_POST['confirm']);


     if(!empty(trim($_POST["name"]))){
          $first = test_input($name);
          if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
            # code...
            $name_err = "Only letters and spaces are allowed";
          }
    }


    if (empty($name_err)) {
      # code...
       // echo "hello world!!";

    	
      $email_query = "SELECT * FROM users WHERE email = ?";

      if ($emailstmt = mysqli_prepare($conn, $email_query)) {
        # code...
        // echo "hello";
        mysqli_stmt_bind_param($emailstmt, 's', $email);
        
        mysqli_stmt_execute($emailstmt);

        $email_result = mysqli_stmt_get_result($emailstmt);
        $emailrow = mysqli_fetch_array($email_result, MYSQLI_BOTH);
        if ($emailrow['email'] == $email) {
          # code...
          echo "
            <script type = \"text/javascript\">
              alert('Email is already registered.');
            </script>
            ";        
        }
        else{

        	$name_query = "SELECT * FROM users WHERE username = ?";

		      if ($namestmt = mysqli_prepare($conn, $name_query)) {
		        # code...
		        // echo "hello";
		        mysqli_stmt_bind_param($namestmt, 's', $name);
		        
		        mysqli_stmt_execute($namestmt);

		        $name_result = mysqli_stmt_get_result($namestmt);
		        $namerow = mysqli_fetch_array($name_result, MYSQLI_BOTH);
		        if ($namerow['username'] == $name) {
		          # code...
		          echo "
		            <script type = \"text/javascript\">
		              alert('name is already registered.');
		            </script>
		            ";        
		        }
		        else{
		        	if ($pass == $conpass) {
	      		// echo "hello 4";
			          $pass = md5($pass); //hashing 
			          $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)"; 
			          if ($stmt = mysqli_prepare($conn, $sql)) {
			            # code...
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
									# code...
									// echo "hello";
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


?>


<!DOCTYPE html>
<html>
<head>
	<title>TechZone</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <script type="text/javascript" src="../js/index.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div id="background"></div>
<script>
	$("#content").load("./user-index.php #particlecode")
</script>	
	<!--particle ends here-->
	</head>
		
	
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
		    </ul>
		   
		  </div>
	</nav>
<br>
	<div class="container" id="content">
		<h2 id="sub-head">Use the attendance manager now!</h2>
		<p class="content">This website helps you maintainig you attendance according to the criteria you mention.</p><hr>
		<h3 class="head-content">How to use?</h3>
		<ul class="content">
			<li>Add each subject</li>
			<li>Add day wise time table</li>
			<li>Check if attended lecture</li>
			<li>Press calculate button to kow how much percentage you have attended</li>
		</ul><hr>
		<h3 class="head-content">Here is a demonstration</h3><hr>
		<h3 class="head-content">Create an account now or Login</h3>
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
		Copyright 2019 <a href="#">@TechZone</a>
	</footer>
</body> 
</html>