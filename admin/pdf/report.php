<?php

session_start();
//include("includes/dbconnection.php");

require("../fpdf182/fpdf.php");

//database connection

$db = new PDO('mysql:host=localhost;dbname=tour_db','root','');



class myPDF extends FPDF{

function header(){

          //$this->Image('log.jpg',20,16);
          $this->SetFont('Arial','B',14);
          $this->Cell(276,5,'TOURISM MANAGEMENT SYSTEM (Booking History)',0,0,'C');
          $this->Ln();
          $this->SetFont('Times','',12);
          $this->Cell(276,10,'info@safaris.com',0,0,'C');
          $this->Ln(20);

}

 function footer(){

       $this->SetY(-15);
       $this->SetFont('Arial','',8);
       $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }

  function headerTable(){

           $this->SetFont('Times','B',12);
           $this->Cell(20,10,'#',1,0,'C');
           $this->Cell(40,10,'Email ',1,0,'C');
           $this->Cell(60,10,'Booking Date',1,0,'C');
           $this->Cell(80,10,'Visiting Date',1,0,'C');
           $this->Cell(40,10,'Amount Paid',1,0,'C');
           $this->Cell(40,10,'M-pesa Ref',1,0,'C');
           $this->Ln();
  }

  function ViewTable($db){

      $this->SetFont('Times','',12);

      //$start_da = $_POST['startDate'];
      //$end_da =   $_POST['endDate'];

      //$stmt = $db->query("select * from orders where order_date >='$search' and order_date <='$end_se'");
      $stmt = $db->query("select * from users join bookings on users.user_id=bookings.user_id join payments on users.user_id=payments.user_id where book_status='Paid'");

      $counter = 1;

      while($data = $stmt->fetch(PDO::FETCH_OBJ)){

        $this->Cell(20,10,$counter,1,0,'C');
        $counter++;
        $this->Cell(40,10,$data->email,1,0,'C');
        $this->Cell(60,10,$data->book_date,1,0,'L');
        $this->Cell(80,10,$data->visit_date,1,0,'L');
        $this->Cell(40,10,$data->amount,1,0,'L');
        $this->Cell(40,10,$data->ref_number,1,0,'L');
        $this->Ln();
      }
  }


}

  $pdf = new myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('L','A4',0);
  $pdf->headerTable();
  $pdf->ViewTable($db);
  $pdf->Output();

 ?>
