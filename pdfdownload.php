<?Php
require("hzdef_/defhome.php"); 
//SQL to get 10 records
$sql="select date,loc,des,distance from ap_task where ap_id=6";
require('fpdf/fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(20,50,40,40,40);
$pdf->SetFont('Arial','B',16);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 

//First header column //
$pdf->Cell($width_cell[0],10,'Date',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Location',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Description',1,0,'C',true); 
//Fourth header column//
//$pdf->Cell($width_cell[3],10,'Distance',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[3],10,'Distance',1,1,'C',true); 
//// header ends ///////

$pdf->SetFont('Arial','',14);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($conn->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['date'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['loc'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['des'],1,0,'C',$fill);
//$pdf->Cell($width_cell[3],10,$row['distance'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['distance'],1,1,'C',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Output();
?>