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
            $_SESSION['event_no']=$_GET["id"];
            $sql1="Select event_name from events where event_id='".$_SESSION['event_no']."'";
            $result1=$conn->query($sql1);
            $row=mysqli_fetch_assoc($result1);
            /*$sql= "INSERT INTO user_events (`event_name`) values('".$result1."') ";*/
           $sql=" INSERT INTO user_event (`sl_no`, `event_name`, `event_id`, `hotel_id`, `travel_id`, `date1`) VALUES (NULL, '".$row["event_name"]."', NULL, NULL, NULL, NULL)";
             $result2=$conn->query($sql);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Durga Pooja</title>
	<meta charset="utf-8">
   	<base href="../">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="scripts/jquery.min.1.12.0.js"></script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="row">
		<h1>Travel Plan</h1>
	</div>
	<center><div class="btn-group btn-group-lg text-center">
  		<button type="button" id="plan" class="btn btn-primary length30">Plan</button>
  		<button type="button" class="btn btn-danger length30">Skip</button>
	</div></center>
	<div id="plan-div">

		<form action="trouvaille/travel.php" method="GET">

			<p>
			 Place: <br><input list="placeid" placeholder="Select The Place!" name="place"> 

  				<?php
  				echo "<datalist id="."placeid".">";
  					$sql = "SELECT * FROM places";
					$result = $conn->query($sql);
					while($row=mysqli_fetch_assoc($result))
					{
    				echo  "<option value=".$row["name"].">";
    				}
    			?>
  				</datalist>
  			</p>
  			<p>Type: <br><input type="radio" name="transport" value="Flight"> Flight<input type="radio" name="transport" value="Train">Train</p>
			<p>One Side:<br><input list="placeid" placeholder="Select The Place!" name="place1"> 

  				<?php
  				echo "<datalist id="."placeid".">";
  					$sql = "SELECT * FROM places";
					$result = $conn->query($sql);
					while($row=mysqli_fetch_assoc($result))
					{
    				echo  "<option value=".$row["name"].">";
    				}
    			?>
  				</datalist>

			</p>
			<p>Return: <br>
				<input list="placeid" placeholder="Select The Place!" name="place2"> 

  				<?php
  				echo "<datalist id="."placeid".">";
  					$sql = "SELECT * FROM places";
					$result = $conn->query($sql);
					while($row=mysqli_fetch_assoc($result))
					{
    				echo  "<option value=".$row["name"].">";
    				}
    			?>
  				</datalist>

			</p>
			<p>Date: <br><input type="date" name="date" ></p>
			<p><input type="submit" name="detailsubmit" value="Go!" style="width: 150px;"></p>
		</form>
	</div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select The Best One For You !</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-md-1">Train No.</div>        	
				<div class="col-md-5">Train Name</div>        	
				<div class="col-md-1">start time</div>        	
				<div class="col-md-1">end time</div>        	
				<div class="col-md-2">available</div> 
				<div class="col-md-2">Cost</div> 

        	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</body>
<script type="text/javascript">
	$(document).ready(function() {
            $("submit-button").click(function(){
                $("#myModal").modal();
            });
        });
</script>
</html>