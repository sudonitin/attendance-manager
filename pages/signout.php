<?php 
	session_start();

	if ($_SESSION['logged_in']=='active') {

		session_destroy();
		$_SESSION = array();
    header("location: ./index.php");
  }

  else{
  		session_destroy();
  		$_SESSION = array();
    	header("location: ./index.php");
  }
?>