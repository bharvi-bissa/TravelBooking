<?php	define('DB_SERVER', '127.0.0.1');
  	define('DB_USERNAME', 'root');
  	define('DB_PASSWORD', '');
  	define('DB_DATABASE', 'travel');
  	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die(mysqli_error());
  	$error="";
  	

?>