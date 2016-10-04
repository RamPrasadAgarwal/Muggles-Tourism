<?php
session_start();
function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    $user='root';
    $pass='';
    $dbname='trouvaille';
   // $topic = 'abc';
            $conn = new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
            $place=$_GET["place"];
            $transport=$_GET["transport"];
            $source=$_GET["place1"];
            $fDestination=$_GET["place2"];
            $date=$_GET["date"];
            echo $_SESSION['event_no'];
            $sql= "INSERT INTO travels (event_id,date1,source,destination, jtype, destination2) VALUES ('".$_SESSION['event_no']."','".$date."','".$source."','".$place."','".$transport."','".$fDestination."')";


			$result = $conn->query($sql);

			$sql1="select travel_id from travels where event_id= '".$_SESSION['event_no']."' ";
			$result1=$conn->query($sql1);
			$row=mysqli_fetch_assoc($result1);
			$sql2= "INSERT INTO user_events (date1, travel_id) VALUES ('".$date."','".$row["travel_id"]."')";
			$result=$conn->query($sql2);

 ?>