  <?php 

  if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
 // access control 
    $ap_id=$_SESSION['ap_id'];
  	include "hzdef_/defhome.php"; 
  	$id=$_POST['tid'];
		//$sdate=$_POST['sdate'];
		$loc=$_POST['loc'];
		$des=$_POST['des'];
		$distance=$_POST['distance'];
		
		
		
				
		$sql = "update ap_task  set loc='".$loc."',des='".$des."',distance='".$distance."' where tid='".$id."'";
		/*$sql.="date='".$sdate."',";
		$sql.="loc='".$loc."',";
		
	
		$sql.="des='".$des."',";
		$sql.="distance='".$distance."'";
		$sql.="where tid='".$id."'";*/
											
		$result = $conn->query($sql);

		$conn->close();
		header("Location: ap_add.php?ap_id=$ap_id");
		
	?>
		