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
                    echo $montime[$count];
                    echo '';
                    echo $mon[$count];
                    echo '';
                    echo $tuetime[$count];
                    echo '';
                    echo $tue[$count];
                }
                
            
            }
            
?>  