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

echo $_SESSION['email'];
?>


<html>
<body>
<a href="./logout">logout</a>
</body>
</html>