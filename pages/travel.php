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
            // $typeT=$_GET["transport"];
           // echo $_SESSION['event_no'];
             $sql = "SELECT * FROM train where source='".$source."' and destination='".$place."' and date1='".$date."'";
             $result = $conn->query($sql);
           ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hotel Plan</title>
    <meta charset="utf-8">
    <base href="../">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="scripts/jquery.min.1.12.0.js"></script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>            <div class="row">
                <div class="col-md-1">Train No.</div>           
                <div class="col-md-5">Train Name</div>          
                <div class="col-md-1">start time</div>          
                <div class="col-md-1">end time</div>            
                <div class="col-md-1">available</div> 
                <div class="col-md-1">Cost</div> 

            </div>
            <div class="row">
           <?php  
            while($row=mysqli_fetch_assoc($result))
             {
             //echo "hi3";
         echo "<div class="."col-md-1".">".$row["train_id"]."</div>         
         <div class="."col-md-5>".$row["train_name"]."</div>          
         <div class="."col-md-1>".$row["start_time"]."</div>          
         <div class="."col-md-1>".$row["end_time"]."</div>          
         <div class="."col-md-1>".$row["availability"]."</div> 
         <div class="."col-md-1>".$row["price"]."</div> ".
         "<div class="."col-md-2>"."<button>Book Now</button>"."</div> ";

         }
            $sql= "INSERT INTO travels (event_id,date1,source,destination, jtype, destination2) VALUES ('".$_SESSION['event_no']."','".$date."','".$source."','".$place."','".$transport."','".$fDestination."')";


			$result = $conn->query($sql);

			$sql1="select travel_id from travels where event_id= '".$_SESSION['event_no']."' ";
			$result1=$conn->query($sql1);
			$row=mysqli_fetch_assoc($result1);
			$sql2= "INSERT INTO user_events (date1, travel_id) VALUES ('".$date."','".$row["travel_id"]."')";
			$result=$conn->query($sql2);

 ?>
 </div><br><br>
 <button><a href="pages/hotel.php?id=0">Book Now</a></button>
</body>