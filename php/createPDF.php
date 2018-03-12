
<?php

    require '../fpdf181/fpdf.php';
    define('FPDF_FONTPATH','../fpdf181/font/');
    $q = ($_POST['q']);
    $connection = new PDO(
       'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
       'root',
       '');

    if ($q == "1"){
      $sql="SELECT * FROM user WHERE position='USER'";
    }else if($q == "2"){
      $sql="SELECT * FROM user WHERE position='ORGANIZER'";
    }else if($q == "3"){
      $sql="SELECT * FROM user";
    }else{
      die("Please try again. Something wrong!");
    }
    class myPDF extends FPDF{
    	function header(){
    		// $this->Image('logo.png',15,10,20);
    		$this->SetFont('AngsanaNew','',14);
    		$this->Cell(276,5,'User Report',0,0,'C');
    		$this->Ln();
    		$this->SetFont('AngsanaNew','',12);
    		$this->Cell(276,10,'littleworm',0,0,'C');
    		$this->Ln(20);
    	}

    	function footer(){
    		$this->SetY(-15);
    		$this->SetFont('AngsanaNew','',12);
    		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    	}

    	function headerTable(){
    		$this->SetFont('AngsanaNew','',12);
    		$this->Cell(20,10,'#',1,0,'C');
    		$this->Cell(130,10,'User Name',1,0,'C');
    		$this->Cell(110,10,'Report Point',1,0,'C');

    		$this->Ln();
    	}

    	function viewTable($connection, $sql){
    		$this->SetFont('AngsanaNew','',12);
    		$stmt = $connection->query($sql);
        $count = 1;
    		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
    				$this->SetFont('AngsanaNew','',12);
    				$this->Cell(20,10,$count,1,0,'C');
    				$this->Cell(130,10,$data->email,1,0,'L');
    				$this->Cell(110,10,$data->report_point,1,0,'C');

    				$this->Ln();
            $count++;
    		}
    	}
    }
?>
<?php
$pdf = new myPDF();
$pdf->AddFont('AngsanaNew','','angsa.php');
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($connection, $sql);
$pdf->Output();
?>
