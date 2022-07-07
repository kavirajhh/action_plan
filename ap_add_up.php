  <?php 

  if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
 // access control 
  	include "hzdef_/defhome.php"; 
  	$id='';	
		$ap_id=$_POST['ap_id'];
		$sdate=$_POST['sdate'];
		$loc=$_POST['loc'];
		$des=$_POST['des'];
		$distance=$_POST['distance'];
		
		
		
				
		$sql = "insert into ap_task  values(";
		$sql.="'".$id."',";
		$sql.="'".$ap_id."',";
		$sql.="'".$sdate."',";
		$sql.="'".$loc."',";
		$sql.="'".$des."',";
		$sql.="'".$distance."'";
		$sql.=")";
											
		$result = $conn->query($sql);

		$conn->close();
		header("Location: ap_add.php?ap_id=$ap_id");
		
	?>
		