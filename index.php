<?php
	require_once 'connections.php';
	if (!$db) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully<br>";


	if(!(isset($_GET['from_place']) || isset($_GET['to_place']) || isset($_GET['date']) || isset($_GET['search']))){
		
		echo "Please Fill the Form !";
	}
	else{

		$from_place=$_GET['from_place'];
		$to_place=$_GET['to_place'];
		$date=$_GET['date'];
		$url="AvailableRoutes.php?from=$from_place&to=$to_place&date=$date";
		header('Location: AvailableRoutes.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BB Booking | Available Routes</title>
</head>
<body>
	<form method="GET" action="AvailableRoutes.php" style="text-align: center;margin-top:10%;">
	<label>From</label>
		<br>
		<select name="from_place">
		  <option value="Select">---Select---</option>
		  <option value="Jodhpur">Jodhpur</option>
		  <option value="Jaipur">Jaipur</option>
		  <option value="Ahemdabad">Ahemdabad</option>
		  <option value="Delhi">Delhi</option>
		</select>
		<br>
		<label>To</label>
		<br>
		<select name="to_place">
		  <option value="Select">---Select---</option>
		  <option value="Jodhpur">Jodhpur</option>
		  <option value="Jaipur">Jaipur</option>
		  <option value="Ahemdabad">Ahemdabad</option>
		  <option value="Delhi">Delhi</option>
		</select>
		<br>
		<label>Date</label>
		<br>
		<input type="date" name="date">
		<br>
		<br>
		<input type="submit" name="submit" value="Search">
	</form>
</body>
</html>