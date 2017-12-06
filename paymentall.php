<?php
  session_start();
  $from_place=$_GET['from_place'];
  $to_place=$_GET['to_place'];
  $bus_no=$_GET['bus_no'];
  $total_fare=$_GET['total_fare'];
  $seats=$_GET['seats'];
  $date=$_GET['date'];
  $time=$_GET['time'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment Confirmation</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- Bootstrap core CSS -->
   <!-- <link href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">-->
    
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <h3>Please Confirm Your Payment Details</h3>
  
  <form action="charge.php" method="GET">
  <table class="table table-striped" style="text-align: center;">
    <tr><td>From :</td><td><?php echo $from_place; ?></td></tr>
    <tr><td>To :</td><td><?php echo $to_place; ?></td></tr>
    <tr><td>Date :</td><td><?php echo $date; ?></td></tr>
    <tr><td>Date :</td><td><?php echo $time; ?></td></tr>
    <tr><td>Bus Number :</td><td><?php echo $bus_no; ?></td></tr>
    <tr><td>Selected Seats :</td><td><?php echo $seats; ?></td></tr>
    <tr><td>Total Fare :</td><td><?php echo $total_fare; ?></td></tr>
    <tr><td>First Name :</td><td><input type="text" name="first_name"></td></tr>
    <tr><td>Last Name :</td><td><input type="text" name="last_name"></td></tr>
    <tr><td>Email :</td><td><input type="text" name="email"></td></tr>
    <input type="hidden" name="from_place" value="<?php echo $from_place; ?>">
    <input type="hidden" name="to_place" value="<?php echo $to_place; ?>">
    <input type="hidden" name="date" value="<?php echo $date; ?>">
    <input type="hidden" name="bus_no" value="<?php echo $bus_no; ?>">
    <input type="hidden" name="seats" value="<?php echo $seats; ?>">
    <input type="hidden" name="total_fare" value="<?php echo $total_fare; ?>">
    <input type="hidden" name="time" value="<?php echo $time; ?>">
    
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="************" // your publishable keys
    data-image="" // your company Logo
    data-name="BB Booking"
    data-description=""
    data-amount="">
  </script>
  </table>
  </form>
</body>
</html>
