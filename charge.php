<?php

  include 'connections.php';
  include 'classes/passcontroller.php';
  //include 'sendmail.php';
/*try {
  require_once 'stripe-php-4.5.1/lib/Stripe.php';
  Stripe::setApiKey("sk_live_A2WSkQHwxwgBeF5dj4p9Irkk  "); //Replace with your Secret Key
 
  $charge = Stripe_Charge::create(array(
  "amount" => 1500,
  "currency" => "usd",
  "card" => $_POST['stripeToken'],
  "description" => "Payment For Booking Tickets."
));
	//send the file, this line will be reached if no error was thrown above
	echo "<h1>Your payment has been completed. We will send you the Facebook Login code in a minute.</h1>";
 
 
you can send the file to this email:
echo $_POST['stripeEmail'];
}
//catch the errors in any way you like
 
catch(Stripe_CardError $e) {
	
}
 
 
catch (Stripe_InvalidRequestError $e) {
// Invalid parameters were supplied to Stripe's API
 
} catch (Stripe_AuthenticationError $e) {
// Authentication with Stripe's API failed
// (maybe you changed API keys recently)
 
} catch (Stripe_ApiConnectionError $e) {
// Network communication with Stripe failed
} catch (Stripe_Error $e) {
 
// Display a very generic error to the user, and maybe send
// yourself an email
} catch (Exception $e) {
 
// Something else happened, completely unrelated to Stripe
}*/
  $from_place=$_GET['from_place'];
  $to_place=$_GET['to_place'];
  $bus_no=$_GET['bus_no'];
  $total_fare=$_GET['total_fare'];
  $seats=$_GET['seats'];
  $seat = explode(",", $seats);
  $date=$_GET['date'];
  $first_name=$_GET['first_name'];
  $last_name=$_GET['last_name'];
  $time=$_GET['time'];
  $email=$_GET['email'];
  $date = date('Y-m-d', strtotime($date));
  $s = str_replace( ',', '', $seats );

  $id_query="SELECT r_id FROM routes WHERE bus_no=$bus_no AND from_place='$from_place' AND to_place='$to_place'";
        $result_id=mysqli_query($db,$id_query);

        while($row=mysqli_fetch_array($result_id,MYSQLI_ASSOC)){
            $r_id=$row['r_id'];
            
        }

  $s_without_rid=str_replace('_'.$r_id, '', $s);
  echo $s_without_rid;
  $length=strlen($s_without_rid);
  echo $length;
  $pass_object=new passcontroller();
  $pass = $pass_object->generateRandomString();
  $newSeat = $pass_object->createSeat($seat, $bus_no, $from_place, $to_place, $db);
  
  $remainingSeats=50-$length;
  if($remainingSeats==0){
    echo "<script>alert('seats not available')</script>";
  }

  $remaining_Seats_func=$pass_object->UpdateSeats($db,$bus_no,$remainingSeats);
  $insertCustomer=$pass_object->insertCustomer($db,$seats,$bus_no,$pass,$first_name,$last_name,$email);
  if($insertCustomer)
  {
    echo "cust inserted";
  }
      

      
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment Success</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="col-md-12">
  <h3>Payment Success</h3>
  </div>
  <div class="col-md-12">
    <form action='generate_pdf.php' method="post">
      <input type="hidden" name="from_place" value="<?php echo $from_place; ?>">
      <input type="hidden" name="to_place" value="<?php echo $to_place; ?>">
      <input type="hidden" name="bus_no" value="<?php echo $bus_no; ?>">
      <input type="hidden" name="total_fare" value="<?php echo $total_fare; ?>">
      <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
      <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
      <input type="hidden" name="seats" value="<?php echo $seats; ?>">
      <input type="hidden" name="date" value="<?php echo $date; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <input type="hidden" name="time" value="<?php echo $time; ?>">
      <input type="submit" name="submit" value="Generate PDF">
    </form>
  </div>



  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>