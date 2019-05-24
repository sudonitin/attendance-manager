<?php 
            // $postmontime = $_POST['postmontime'];
            // $postmon = $_POST['postmon'];
            // $posttuetime = $_POST['posttuetime'];
            // $posttue = $_POST['posttue'];
            // $postwedtime = $_POST['postwedtime'];
            // $postwed = $_POST['postwed'];
            // $postthutime = $_POST['postthutime'];
            // $postthu = $_POST['postthu'];
            // $postfritime = $_POST['postfritime'];
            // $postfri = $_POST['postfri'];
            // echo $postwed;
			// if($postfri == 'a' and $postfritime == 'a' and $postmon  == 'a' and $postmontime == 'a' and $postthu == 'a' and $postthutime == 'a' and  $posttue == 'a' and $posttuetime == 'a' and $postwed == 'a' and $postwedtime == 'a'){
            //     echo "something just like this";

            // }
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
                # code...
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
                    # code...
                    // echo $montime[$count];
                    // echo '';
                    // echo $mon[$count];
                    // echo '';
                    // echo $tuetime[$count];
                    // echo '';
                    // echo $tue[$count];

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
                    echo $fritime_clean;
                    $query .= '
                    INSERT INTO timetable VALUES("'.$montime_clean.'", "'.$mon_clean.'","'.$tuetime_clean.'","'.$tue_clean.'","'.$wedtime_clean.'","'.$wed_clean.'","'.$thutime_clean.'","'.$thu_clean.'","'.$fritime_clean.'","'.$fri_clean.'")
                    ';

                    // foreach ($_POST["fri"] as $key => $value) {
                    //     # code...
                    //     echo 'key'.$key;
                    //     echo '';
                    //     echo 'value'.$value;
                    // }
                }

                if (mysqli_multi_query($conn, $query)) {
                    # code...

                    echo "data inserted";
                }
                else{
                    echo mysqli_error($conn);
                    echo "all fields r equirde";
                }
            
            }
        }   
?>  