<?php
	include_once 'connections.php';
	
	if (!$db) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}

	if(!(isset($_GET['from_place']) || isset($_GET['to_place']) || isset($_GET['date']) || isset($_GET['search']))){
		
		//echo "Please Fill the Form !";
	}
	else{

		$from_place=$_GET['from_place'];
		$to_place=$_GET['to_place'];
		$date_from_sql=$_GET['date'];
		$dateis = date('Y-m-d', strtotime($date_from_sql));
		$query="SELECT * FROM routes WHERE from_place='$from_place' AND to_place='$to_place' AND dateis='$dateis'";
		$result=mysqli_query($db,$query);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BB Booking  | Available Routes</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<table class="table table-striped table-responsive" style="width: 80%;text-align: center;">
		<tr><td>From</td><td>To</td><td>Date</td><td>Distance</td><td>Fare</td><td>Arrival Time</td><td>Departure Time</td><td>Bus Number</td><td>Time</td></tr>
		<?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
			$dep_time=substr($row['dep_time'],0,5);
			$arr_time=substr($row['arr_time'],0,5);
			$time=substr($row['timeis'],0,5);
			$bus_no=$row['bus_no'];
			$fare=$row['fare'];
			echo "<tr><td>".$row['from_place']."</td><td>".$row['to_place']."</td><td>".$row['dateis']."</td><td>".$row['distance']." km</td><td>Rs ".$row['fare']."</td><td>".substr($row['arr_time'],0,5)."</td><td>".substr($row['dep_time'],0,5)."</td><td>".$row['bus_no']."</td>"."<td>".$time."</td><td><a href='SeatSelection.php?from_place=$from_place&to_place=$to_place&date=$dateis&arr_time=$arr_time&dep_time=$dep_time&bus_no=$bus_no&fare=$fare&time=$time&date=$dateis'>Book Now</a></td></tr>";
			 
		}
		?>
         
	</table>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
