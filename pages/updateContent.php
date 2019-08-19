<?php 
            // logic of updating table is
            // 1)Delete all the rows of this id DONE
            // 2)Insert the whole table DONE
            session_start();
            echo $_SESSION['id'] . " ". $_SESSION['username'];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "attendance";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            if (isset($_POST["montime"])) {

                // execute the delete query first
                $delquery = 'DELETE FROM timetable WHERE id= '.$_SESSION["id"];
                if (mysqli_query($conn, $delquery)) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }

                $montime  = $_POST["montime"];
                $mon = $_POST["mon"];
                $tuetime = $_POST["tuetime"];
                $tue = $_POST["tue"];
                $wedtime  = $_POST["wedtime"];
                $wed  = $_POST["wed"];
                $thutime  = $_POST["thutime"];
                $thu  = $_POST["thu"];
                $fritime  = $_POST["fritime"];
                $fri  = $_POST["fri"];
            
                $query = '';
                
                for ($count=0; $count < count($montime); $count++) { 
                   
                    $mon_clean = mysqli_real_escape_string($conn, $mon[$count]);
                    $montime_clean = mysqli_real_escape_string($conn, $montime[$count]);
                    $tue_clean = mysqli_real_escape_string($conn, $tue[$count]);
                    $tuetime_clean = mysqli_real_escape_string($conn, $tuetime[$count]);
                    $wed_clean = mysqli_real_escape_string($conn, $wed[$count]);
                    $wedtime_clean = mysqli_real_escape_string($conn, $wedtime[$count]);
                    $thu_clean = mysqli_real_escape_string($conn, $thu[$count]);
                    $thutime_clean = mysqli_real_escape_string($conn, $thutime[$count]);
                    $fri_clean = mysqli_real_escape_string($conn, $fri[$count]);
                    $fritime_clean = mysqli_real_escape_string($conn, $fritime[$count]);
                    //echo $fritime_clean;
                    $query .= '
                    INSERT INTO timetable VALUES("'.$montime_clean.'", "'.$mon_clean.'","'.$tuetime_clean.'","'.$tue_clean.'","'.$wedtime_clean.'","'.$wed_clean.'", "'.$thutime_clean.'","'.$thu_clean.'","'.$fritime_clean.'","'.$fri_clean.'", "'.$_SESSION["id"].'");
                    '; //';'must be present at the end of query because we are implementing multiple sql queries and these queries are separated by a semi-colon
                  
                }
                $_SESSION['tt'] = 'inserted';
                if (mysqli_multi_query($conn, $query)) {
                    echo "data inserted";
                }
                else{
                    echo mysqli_error($conn);
                    echo "all fields r equirde";
                }
            
            }
        }   
?>  