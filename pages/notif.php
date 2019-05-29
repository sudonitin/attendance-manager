<?php
if (isset($_POST['as'])) {
    # code...
    $i = 1;
    echo "<table class='table table-bordered' id='tab_logic' >
    <thead class='thead-light' >
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Time</th>
        <th scope='col'>Mon</th>
        <th scope='col'>Time</th>
        <th scope='col'>Tue</th>
        <th scope='col'>Time</th>
        <th scope='col'>Wed</th>
        <th scope='col'>Time</th>
        <th scope='col'>Thu</th>
        <th scope='col'>Time</th>
        <th scope='col'>Fri</th>
      </tr>
    </thead>
    <tbody>
        <tr id='addr0'></tr>
    </tbody>	
    </table>" . $i ;
    $i += 1;
}   
?>

<html>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p></p>
    <p id = ''>kjkjf</p>
    <input type='submit' value='submit' name='as'/>
</form>
</body>
</html>