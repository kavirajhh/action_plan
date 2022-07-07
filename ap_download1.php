<?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.html");
        exit();
      }
else{

        include "hzdef_/defhome.php"; 
        require('fpdf/fpdf.php');
        $s_cOde=$_SESSION['s_cOde'];
        $ap_id=$_REQUEST['ap_id'];
        $_SESSION['ap_id']=$ap_id;
        $nic=ap_nic($conn,$ap_id);
        $status=ap_status($conn,$ap_id);
        $uname=user_name($conn,$nic);
        $des_id=user_des($conn,$nic);
        $des=desname_id($conn,$des_id);
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',10);
}
?>

 

                            
      <?php
        $sql="SELECT * FROM ap_task where ap_id='".$ap_id."' order by date";
        $run_ins = mysqli_query($conn, $sql);
        
        while ($row_ins=mysqli_fetch_array($run_ins)) 
        {   $id=$row_ins['tid'];
            $date = $row_ins['date'];
            $loc= $row_ins['loc'];
            
            $des= $row_ins['des'];
            $distance= $row_ins['distance'];
        

        $pdf->Cell(20,10,$id,1);
        $pdf->Cell(30,10,$date,1);
        $pdf->Cell(30,10,$loc,1);
        $pdf->Cell(50,10,$des,1);
        $pdf->Cell(20,10,$distance,1);
        $pdf->Ln();
}
$pdf->Output();

     
      ?>
                            
     