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
    // $tmp = mysqli_fetch_array($result);
    $i = 0;
?>


		<table class="table table-bordered" id="tab_logi1" >
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
                $wedtime = [];
                while($row = mysqli_fetch_array($result)) {
                    # code...
                $i += 1;
                array_push($wedtime, $row['wedtime']);
            ?>
            <tr id="addr<?php echo $i?>">
                <td> <?php echo $i?></td>
                <td class="montime"> <?php echo $row['montime']?> </td>
                <td class="mon"> <?php echo $row['mon']?> </td>
                <td class="tuetime"> <?php echo $row['tuetime']?> </td>
                <td class="tue"> <?php echo $row['tue']?> </td>
                <td class="wedtime"> <?php echo $row['wedtime']?> </td>
                <td class="wed"> <?php echo $row['wed']?> </td>
                <td class="thutime"> <?php echo $row['thutime']?> </td>
                <td class="thu"> <?php echo $row['thu']?> </td>
                <td class="fritime"> <?php echo $row['fritime']?> </td>
                <td class="fri"> <?php echo $row['fri']?> </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
				<!-- <input type = "submit" value="submit" id='insert' name="insert"> -->
			
			
		</table>

<?php     
    $_SESSION['tt'] = 'inserted';
    }
    

?>