<?php
	include_once 'connections.php';
	if(isset($_GET["insert"])){
		$b = str_replace( ',', '', $_GET["insert"] );
		$fare=$_GET['fare'];
		$data= (strlen($b)*$fare)/3;
		$response = array('total_fare' => $data, 'seats' => $_GET["insert"]);
		echo json_encode($response);

		//echo $data;
		//echo $_GET['insert'];
	} 
?>