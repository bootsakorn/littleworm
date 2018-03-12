
<?php
    require '../fpdf181/fpdf.php';
    define('FPDF_FONTPATH','../fpdf181/font/');
    $q = ($_POST['q']);
    $r = ($_POST['r']);
    $connection = new PDO(
       'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
       'root',
       '');

    if ($q == "1"){
      $sql="SELECT id,name,organizer_email,date_start,place,max FROM event WHERE TYPE ='$r' ORDER BY id";
    }else if($q == "5"){
      $sql="SELECT id,name,organizer_email,date_start,place,max FROM event WHERE organizer_email ='$r' ORDER BY id";
    }else if($q == "6"){
      $sql="SELECT id,name,organizer_email,date_start,place,max FROM event WHERE place ='$r' ORDER BY id";
    }else if($q == "0"){
      $sql="SELECT id,name,organizer_email,date_start,place,max FROM event ORDER BY id";
    }else if($q == "2"){
      $sql="SELECT id,name,organizer_email,date_start,place,max FROM event WHERE date_start ='$r' ORDER BY id";
    }else{
      die("not found");
    }
    class myPDF extends FPDF{
    	function header(){
    		$this->SetFont('AngsanaNew','',14);
    		$this->Cell(276,5,'Event Report',0,0,'C');
    		$this->Ln();
    		$this->SetFont('AngsanaNew','',18);
    		$this->Cell(276,10,'littleworm',0,0,'C');
    		$this->Ln(20);
    	}

    	function footer(){
    		$this->SetY(-15);
    		$this->SetFont('AngsanaNew','',18);
    		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    	}

    	function headerTable(){
    		$this->SetFont('AngsanaNew','',18);
    		$this->Cell(20,10,'#',1,0,'C');
    		$this->Cell(60,10,'Event Name',1,0,'C');
    		$this->Cell(60,10,'Organizer Name',1,0,'C');
        $this->Cell(40,10,'Date',1,0,'C');
        $this->Cell(60,10,'Place',1,0,'C');
        $this->Cell(40,10,'Quantity',1,0,'C');

    		$this->Ln();
    	}

    	function viewTable($connection, $sql){
    		$this->SetFont('AngsanaNew','',18);
    		$stmt = $connection->query($sql);
        $count = 1;
    		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            foreach ($connection->query("SELECT DISTINCT organizer.company_name FROM `event` JOIN `organizer` WHERE organizer.email='$data->organizer_email'") as $row) {
              $or_name = $row['company_name'];
            }
    				$this->SetFont('AngsanaNew','',18);
    				$this->Cell(20,10,$count,1,0,'C');
    				$this->Cell(60,10,$data->name,1,0,'C');
            $this->Cell(60,10,$or_name,1,0,'C');
            $this->Cell(40,10,$data->date_start,1,0,'C');
            $this->Cell(60,10,$data->place,1,0,'C');
    				$this->Cell(40,10,$data->max,1,0,'C');

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
