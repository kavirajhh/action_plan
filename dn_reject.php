 <?php

    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
else{

        include "hzdef_/defhome.php"; 
        $s_cOde=$_SESSION['s_cOde'];
        
}
?>



    
     <?php  
            if(isset($_POST['reject'] ) ) 
            {   $reason=$_POST['reason'];
                $ap_by=$_SESSION['s_cOde'];
                $dn_id=$_REQUEST['dn_id'];
                $date=date("Y/m/d");
                $sql = "update dn set status=3,app_date='".$date."',app_by='".$ap_by."',remark='".$reason."' where dn_id='".$dn_id."'";
                $result = $conn->query($sql);
                $conn->close();
                header("Location: dn_not_approve.php");
             } 

            ?>

<?php include_once('header.php'); ?>
    <form action="" method="post" enctype="multipart/form-data">
     
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <h2 class="pageheader-title"><i class="fa fa-user" aria-hidden="true"></i> Reason for rejection</h2>
          </div>
        </div>
    </div>

      <div class="item">
           
      </div>
  
      <div class="item">
      <p>Reason <span class="required">*</span></p>
      <input type="text" name="reason" />
      </div>
      
      

          <div class="input-group input-group-icon">
            <input type="submit" name="reject" value="reject" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
    </form>
    </div>


</body>

</html>