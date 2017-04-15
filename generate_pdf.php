<?php
	ob_start();
	require 'connections.php';
	require('fpdf/fpdf.php');


	if(isset($_POST['submit']) ) {
		$lineBreak=15.81;
		$lb=17.11;
		$image1 = "img/signature.png";
		$from_place=$_POST['from_place'];
	  	$to_place=$_POST['to_place'];
	  	$bus_no=$_POST['bus_no'];
	  	$total_fare=$_POST['total_fare'];
	  	$seats=$_POST['seats'];
	  	$date=$_POST['date'];
		$first_name=$_POST['first_name'];
	  	$last_name=$_POST['last_name'];
	  	$time=$_POST['time'];
	  	$email=$_POST['email'];
	  	$date = $_POST['date'];
	  	$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,"Bros and Hoes Booking",1,1,'C');
		$pdf->Ln($lineBreak);
		$pdf->Write(5,'Ticket Details','C');
		$pdf->SetFont('Arial','',10);
		$pdf->Ln($lineBreak);
		$pdf->Cell(90,10,"First Name :",1,0,'C');
		$pdf->Cell(90,10,$first_name,1,1,'C');
		$pdf->Cell(90,10,"Last Name :",1,0,'C');
		$pdf->Cell(90,10,$last_name,1,1,'C');
		$pdf->Cell(90,10,"From :",1,0,'C');
		$pdf->Cell(90,10,$from_place,1,1,'C');
		$pdf->Cell(90,10,"To :",1,0,'C');
		$pdf->Cell(90,10,$to_place,1,1,'C');
		$pdf->Cell(90,10,"Bus No. :",1,0,'C');
		$pdf->Cell(90,10,$bus_no,1,1,'C');
		$pdf->Cell(90,10,"Seats Selected :",1,0,'C');
		$pdf->Cell(90,10,$seats,1,1,'C');
		$pdf->Cell(90,10,"Time :",1,0,'C');
		$pdf->Cell(90,10,$time,1,1,'C');
		$pdf->Cell(90,10,"Date :",1,0,'C');
		$pdf->Cell(90,10,$date,1,1,'C');
		$pdf->Cell(90,10,"Email :",1,0,'C');
		$pdf->Cell(90,10,$email,1,1,'C');
		$pdf->Ln($lineBreak);
		$pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
		$pdf->Ln($lb);
		$pdf->Write(5,'Authorized Signature ');
		$pdf->Output();	


	  }

	  
?>