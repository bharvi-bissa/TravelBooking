<?php 
	//include("./connections.php");

	class passcontroller{

		public function UpdateSeats($db,$bus_no,$remaining_seats){
			$query="UPDATE totalseats SET remaining_seats='$remaining_seats' WHERE bus_no='$bus_no'";
			$result=mysqli_query($db,$query);
			echo "SeatsUpdated";
		}

		public function seatsToDisable($bus_no,$db){
			$query="SELECT seats_selected FROM reservedseats where bus_no='$bus_no'";
			$result=mysqli_query($db,$query);
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$seatsArray=$row['seat_selected'];
			}
			return $seatsArray;
		}
		
		public function generateRandomString($length = 10) {
			    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }
			    return $randomString;
		}

		public function getRouteId($bus_no, $from, $to, $db) {
			$id_query="SELECT r_id FROM routes WHERE bus_no=$bus_no AND from_place='$from' AND to_place='$to'";
  			$result_id=mysqli_query($db,$id_query);

  			while($row=mysqli_fetch_array($result_id,MYSQLI_ASSOC)){
		        $r_id=$row['r_id'];
		    }
		    return $r_id;
		}

		public function getBookingId($db){
			
			$query="SELECT MAX(re_id) AS max FROM reservedseats";
			$result = mysqli_query($db,$query);
			$num = mysqli_num_rows($result);
			if($num > 0){
				$row = mysqli_fetch_row($result);
				$id=$row[0];
				$id++;
				return $id;
			}
			
			return 1;
			
		}

		public function generateCid(){
			$characters = '01234';
			    $charactersLength = strlen($characters);
			    $c_id = '';
			    for ($i = 0; $i < 4; $i++) {
			        $c_id .= $characters[rand(0, $charactersLength - 1)];
			    }
			    return $c_id;
		}

		public function findCidFromRs($db,$bus_no,$seat_selected){
			$query="SELECT c_id FROM reservedseats  WHERE bus_no='$bus_no' AND seat_selected='$seat_selected'";
			$result=mysqli_query($db,$query);
			return $result;
		}

		public function insertCustomer($db,$seat_selected,$bus_no,$pass,$first_name,$last_name,$email){
			$c_id=$this->findCidFromRs($db,$bus_no,$seat_selected);
			$queryForCustomers="INSERT into customers(c_id,pass,first_name,last_name,email) values ('$c_id','$pass','$first_name','$last_name','$email')";
			$resultCustomer=mysqli_query($db,$queryForCustomers);
			echo "yo";
		}

		private function insertSeat($reid,$r_id,$from,$to,$newSeat,$db,$c_id){

			$query="INSERT INTO `reservedseats` (`re_id`,`c_id`, `r_id`, `from_place`, `to_place`, `seat_selected`, `time`, `date`) VALUES ('$reid','$c_id', '$r_id', '$from', '$to', '$newSeat', '12:33:00.000000','2017-03-08')";
			$result=mysqli_query($db,$query);
			return $result;
		}

		public function createSeat(&$seat, $bus_no, $from, $to, $db) {
			$rid = $this->getRouteId($bus_no, $from, $to, $db);
			$c_id=$this->generateCid();
			for ($i=0; $i < sizeof($seat); $i++) { 
				$book_id=$this->getBookingId($db);
				if($this->insertSeat($book_id,$rid,$from,$to,$seat[$i],$db,$c_id)){
					echo "success";
				}
				if($this->getBookingId($db)){
					echo "it works";
				}
				else echo "it doesnot work";
			}

		}

	}
?>