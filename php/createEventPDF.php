
<?php
    require '../fpdf181/fpdf.php';
    $q = ($_POST['q']);
    $r = ($_POST['r']);
    $connection = new PDO(
       'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
       'root',
       '');

    if ($q == "1"){
      $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE type ='$r' ORDER BY id";
    }else if($q == "5"){
      $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE organizer_name ='$r' ORDER BY id";
    }else if($q == "6"){
      $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE place ='$r' ORDER BY id";
    }else if($q == "0"){
      $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event ORDER BY id";
    }else if($q == "2"){
      $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE date ='$r' ORDER BY id";
    }else{
      die("not found");
    }
    class myPDF extends FPDF{
    	function header(){
    		$this->SetFont('Arial','B',14);
    		$this->Cell(276,5,'Event Report',0,0,'C');
    		$this->Ln();
    		$this->SetFont('Times','',12);
    		$this->Cell(276,10,'littleworm',0,0,'C');
    		$this->Ln(20);
    	}

    	function footer(){
    		$this->SetY(-15);
    		$this->SetFont('Times','',12);
    		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    	}

    	function headerTable(){
    		$this->SetFont('Times','B',12);
    		$this->Cell(20,10,'#',1,0,'C');
    		$this->Cell(60,10,'Event Name',1,0,'C');
    		$this->Cell(60,10,'Organizer Name',1,0,'C');
        $this->Cell(40,10,'Date',1,0,'C');
        $this->Cell(60,10,'Place',1,0,'C');
        $this->Cell(40,10,'Quantity',1,0,'C');

    		$this->Ln();
    	}

    	function viewTable($connection, $sql){
    		$this->SetFont('Times','',12);
    		$stmt = $connection->query($sql);
        $count = 1;
    		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
    				$this->SetFont('Times','B',12);
    				$this->Cell(20,10,$count,1,0,'C');
    				$this->Cell(60,10,$data->name,1,0,'C');
            $this->Cell(60,10,$data->organizer_name,1,0,'C');
            $this->Cell(40,10,$data->date,1,0,'C');
            $this->Cell(60,10,$data->place,1,0,'C');
    				$this->Cell(40,10,$data->participant_amt,1,0,'C');

    				$this->Ln();
            $count++;
    		}
    	}
    }
?>
<?php
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($connection, $sql);
$pdf->Output();
?>
