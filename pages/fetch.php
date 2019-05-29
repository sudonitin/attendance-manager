<?php
session_start();
//echo $_SESSION['id'] . " ". $_SESSION['userqur'];
$serverqur = "localhost";
$userqur = "root";
$password = "";
$db = "attendance";
// Create connection
$conn = mysqli_connect($serverqur, $userqur, $password, $db);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else{
    $output = '';
    $qur = 'SELECT * FROM timetable WHERE id= "'.$_SESSION["id"].'"';
    $result = mysqli_query($conn, $qur);
    $i = 0;
?>


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
            <?php 
                while($row = mysqli_fetch_array($result)) {
                    # code...
                $i += 1;
            ?>
            <tr>
                <td> <?php echo $i?></td>
                <td> <?php echo $row['montime']?> </td>
                <td> <?php echo $row['mon']?> </td>
                <td> <?php echo $row['tuetime']?> </td>
                <td> <?php echo $row['tue']?> </td>
                <td> <?php echo $row['wedtime']?> </td>
                <td> <?php echo $row['wed']?> </td>
                <td> <?php echo $row['thutime']?> </td>
                <td> <?php echo $row['thu']?> </td>
                <td> <?php echo $row['fritime']?> </td>
                <td> <?php echo $row['fri']?> </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
				<!-- <input type = "submit" value="submit" id='insert' name="insert"> -->
			
			
		</table>

<?php     

    }
    

?>