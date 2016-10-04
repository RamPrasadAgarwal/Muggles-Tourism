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
<body>
	<div class="row form-div">
		<div class="col-md-3 heading">Hotel Plan</div>
		<div class="col-md-7">
			<form action="pages\hotel.php" method="GET">
				Star: <select name="stars">
  					<option value="5">5</option>
  					<option value="4">4</option>
  					<option value="3">3</option>
  					<option value="2">2</option>
  					<option value="1">1</option>
				</select>
				Under: <select name="priceCat">
  					<option value="10000">Rs. 10000</option>
  					<option value="5000">Rs. 5000</option>
  					<option value="2000">Rs. 2000</option>
  					<option value="1000">Rs. 1000</option>
				</select>
				<input type="submit" name="submit-hotel" value="Go!">
			</form>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-danger length30">Skip</button>
		</div>
	</div>
	<?php
	 $stars=$_GET["stars"];
	 $priceC=$_GET["priceCat"];
	 $sql1="Select * from hotels where star = '".$stars."' and price between 0 and '".$priceC."'";
            $result1=$conn->query($sql1);
            while($row=mysqli_fetch_assoc($result1))
            {

            /*$sql= "INSERT INTO user_events (`event_name`) values('".$result1."') ";*/
           /*$sql=" INSERT INTO user_event (`sl_no`, `event_name`, `event_id`, `hotel_id`, `travel_id`, `date1`) VALUES (NULL, '".$row["event_name"]."', NULL, NULL, NULL, NULL)";
             $result2=$conn->query($sql);*/
	
	echo "<div class="."hotel-content>
		<div class="."row".">
			<div class="."col-md-2".">
				<img src="."images/hotel/1.jpg" ."width="."150px" ."height="."150px".">"
			."</div>
			<div class="."col-md-10".">
				<h3>
				".$row["h_name"]."
				</h3>
				<div class="."row".">
					<div class="."col-md-6".">
						<p>".$row["address"]."</p>
						<p>Area</p>
						<p><span class="."glyphicon glyphicon-star"."></span><span class="."glyphicon glyphicon-star"."></span><span class="."glyphicon glyphicon-star"."></span><span class="."glyphicon glyphicon-star-empty"."></span><span class="."glyphicon glyphicon-star-empty"."></span></p>
					</div>
					<div class="."col-md-6 text-right".">
						<p>Rs. 8000</p>
						<p class="."green".">Available=".$row["availability"]."</p>
						<p><button class="."green-button" ."onclick="."".">Book</button></p>
					</div>

				</div>
			</div>
		</div>
	</div>";
}
?>
</body>
<style type="text/css">
	body{
		background-image: url(images/hotel-wall.jpg);
		background-size: cover;
	}
</style>
</html>