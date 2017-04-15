<?php 
	include 'connections.php';
	include 'classes/passcontroller.php';
	session_start();
	@$from_place=$_GET['from_place'];
	@$to_place=$_GET['to_place'];
	@$date=$_GET['date'];
	@$dateis = date('d-m-Y', strtotime($date));
	@$dep_time=$_GET['dep_time'];
	@$arr_time=$_GET['arr_time'];
	@$bus_no=$_GET['bus_no'];
	@$fare=$_GET['fare'];
	@$seats = $_POST['seats'];
	@$total_fare = $_POST['total_fare'];
	@$time=$_GET['time'];
	echo $seats.' '.$total_fare;
	$_SESSION['total_fare']=$total_fare;
	$_SESSION['seats']=$seats;

	$pass_object = new passcontroller();
	$rid = $pass_object->getRouteId($bus_no, $from_place, $to_place, $db);

	$query="SELECT seat_selected FROM reservedseats WHERE from_place='$from_place' AND to_place='$to_place'";
			$result=mysqli_query($db,$query);
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$seatsArray[] = $row['seat_selected'];
			}
			@$seatString = implode(',', $seatsArray);
	

			
			
	/*@$seat_selected = $_POST['data'];
	@$b = str_replace( ',', '', $seat_selected);
	$total_fare= strlen($b)*$fare;
	echo $total_fare;*/
		//echo $data;
	//@$all_seats=$_POST['data'];
	//echo $all_seats;
	//echo $total_fare;
	/*echo $from_place;
	echo $to_place;
	echo $dateis;
	echo $dep_time;
	echo $arr_time;
	echo $bus_no;
	echo $fare;*/
	/*if(isset($_GET['submit'])){//to run PHP script on submit
		if(!empty($_GET['seat_no'])){
		// Loop to store and display values of individual checked checkbox.
		foreach($_GET['seat_no'] as $selected){
		echo $selected."</br>";
		}
	}
}*/
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seat Selection</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- Bootstrap core CSS -->
   <!-- <link href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">-->
    
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    

    </head>

    <body>
    <div class="col-md-6 col-sm-12">
    <h4>Journey Information</h4>
    	<table class="table" style="text-align: center;width: 50%;margin-top: 6%;">
    		<tr><td>Bus No. :</td><td><?php echo $bus_no; ?></td></tr>
    		<tr><td>From :</td><td><?php echo $from_place; ?></td></tr>
    		<tr><td>To :</td><td><?php echo $to_place; ?></td></tr>
    		<tr><td>Fare :</td><td><?php echo $fare; ?></td></tr>
    		<tr><td>Time :</td><td><?php echo $time; ?></td></tr>
    		<tr><td>Date :</td><td><?php echo $dateis; ?></td></tr>
    		<tr><td>Arrival Time :</td><td><?php echo $arr_time; ?></td></tr>
    		<tr><td>Fare :</td><td><?php echo $fare; ?></td></tr>
    		<tr><td>Total Fare :</td><td id="total_fare"></td></tr>
    		<tr><td>Seats Selected :</td><td id="seat_selected"></td></tr>
    	</table>
    </div>
    <form method="GET" action="BookingTicketConfirm.php">
    <div class="col-md-6 col-sm-12" style="text-align: center;">
		<h3 style="text-align: center;">Select Your Seats</h3>
    	<div class="container " style="width:40%;height:40%;margin-top: 5%;">

		<div class="row">
			<input type="hidden" name="farefield" value="<?php echo $fare; ?>" id="fare">
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="A_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;A <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="B_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;B <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="C_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;C <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="D_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;D <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="E_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;E <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="F_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;F <span class="glyphicon glyphicon-print"></span></div>
		</div>
			<div class="row">
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="G_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;G <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="H_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;H <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="I_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;I <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="J_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;J <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="K_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;K <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="padding:10px"></div>
        
		</div>
		<div class="row">
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="L_<?php echo $rid ?>" name="seat_no[]" class="get_seat">&nbsp;L <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="padding:10px"></div>
  			<div class="col-sm-2" style="padding:10px"></div>
  			<div class="col-sm-2" style="padding:10px"></div>
  			<div class="col-sm-2" style="padding:10px"></div>
  			<div class="col-sm-2" style="padding:10px"></div>
		</div>
			<div class="row">
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="M_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;M <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="N_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;N <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="O_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;O <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="P_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;P <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="Q_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;Q <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="R_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;R <span class="glyphicon glyphicon-print"></span></div>
	</div>
		<div class="row">
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="S_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;S <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="T_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;T <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="U_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;U <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="V_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;V <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="W_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;W <span class="glyphicon glyphicon-print"></span></div>
  			<div class="col-sm-2" style="border-style: groove; padding:10px"><input type="checkbox" value="X_<?php echo $rid ?>" class="get_seat" name="seat_no[]">&nbsp;X <span class="glyphicon glyphicon-print"></span></div>

		</div>
		<div id="result"></div>
		<input type="hidden" name="total_fare" value="<?php echo $total_fare; ?>">
		
    	</form>
		<?php
			echo "<a href='BookingTicketConfirm.php?time=".$time."&from_place=".$from_place."&to_place=".$to_place."&date=".$dateis."&bus_no=".$bus_no."&seats=".$seats."&total_fare=".$total_fare."'>Proceed</a>"; 

		?>
		
		
		
	</div>
			
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			
	</body>
	<script>
		function disable() {
  				 $(".get_seat[value='A']").prop("disabled", true);
				}
		$(document).ready(function(){

			var seat = "<?php echo $seatString ?>";
			var seats = seat.split(',');
			if(seat != ''){
				seats.forEach(disableFunction);
			}
			

			function disableFunction(value, index) {
				$("input[value='"+value+"']").parent().css("background","#ccc");
				$('input[value="'+value+'"]').prop("disabled",true);
			}

			console.log(seats);

			$('.get_seat').click(function(){
			 	var insert = [];
			 	var fare=$('#fare').val();
			 	$('.get_seat').each(function(){
			 		if($(this).is(":checked")) {
			 			insert.push($(this).val());
			 		}
				});
			 	insert = insert.toString();
			 	$.ajax({
				 	url: "insertseat.php",
				 	method: "GET",
				 	data:{
				 		insert:insert,
				 		fare:fare
				 	},
				 	success:function(data){
				 		var d = JSON.parse(data);
				 		$('#seat_selected').html(d.seats);
				 		$('#total_fare').html(d.total_fare);
				 		$.ajax({
				 			url: "SeatSelection.php",
				 			method: "POST",
				 			dataType : 'json',
				 			data: {
				 				seats:d.seats,
				 				total_fare:d.total_fare
				 			}
				 		});
				 	}	
 				});

 			});
		});
</script>
</html>
