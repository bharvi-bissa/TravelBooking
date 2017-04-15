<?php 
	session_start();
	include 'connections.php';
	$from_place=$_GET['from_place'];
	$to_place=$_GET['to_place'];
	$date=$_GET['date'];
	$bus_no=$_GET['bus_no'];
	$seats=$_GET['seats'];
	//$total_fare=$_GET['total_fare'];
	//echo $total_fare;
	$total_fare=$_SESSION['total_fare'];
	$seats=$_SESSION['seats'];
	$time=$_GET['time']
	

?>

<style type="text/css">
	td{
		border: 2px solid #fff;
	}
}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm Yout Booking | BB Booking</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- Bootstrap core CSS -->
   <!-- <link href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">-->
    
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="col-offset-12">
	<h3>Confirm Your Booking Details</h3>
	<table class="table table-striped"  method="GET" action="payment.php" style="text-align: center;width: 50%;"">
		<tr><td>From :</td><td><?php echo $from_place; ?></td></tr>
		<tr><td>To :</td><td><?php echo $to_place; ?></td></tr>
		<tr><td>Date :</td><td><?php echo $date; ?></td></tr>
		<tr><td>Bus Number :</td><td><?php echo $bus_no; ?></td></tr>
		<tr><td>Selected Seats :</td><td><?php echo $seats; ?></td></tr>
		<tr><td>Total Fare :</td><td><?php echo $total_fare; ?></td></tr>
		<tr><td>Select Mode of Payment</td><td><select><option value="">---Select---</option><option value="InstaMojo">Stripe</option></select></td></tr>
		<!-- <tr><td>First Name</td><td><input type="text" name="first_name" placeholder="Enter First Name"></td></tr>
		<tr><td>Last Name</td><td><input type="text" name="last_name" placeholder="Enter Last Name"></td></tr>
		<tr><td>Email </td><td><input type="text" name="email"></td></tr> -->
		<tr><td style="width: 100%;"><?php echo "<a href='paymentall.php?from_place=$from_place&to_place=$to_place&date=$date&bus_no=$bus_no&seats=$seats&total_fare=$total_fare&time=$time'>Make Payment</a>" ?></td></tr>
	</table>
		
</div>
</body>
</html>