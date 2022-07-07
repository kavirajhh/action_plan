  <?php 

  if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
 // access control 
    $dn_id=$_SESSION['dn_id'];
  	include "hzdef_/defhome.php"; 
  	$id=$_POST['tid'];
		//$sdate=$_POST['sdate'];
		$loc=$_POST['loc'];
		$des=$_POST['des'];
		$distance=$_POST['distance'];
		
		
		
				
		$sql = "update dn_task  set loc='".$loc."',des='".$des."',distance='".$distance."' where tid='".$id."'";
		/*$sql.="date='".$sdate."',";
		$sql.="loc='".$loc."',";
		
	
		$sql.="des='".$des."',";
		$sql.="distance='".$distance."'";
		$sql.="where tid='".$id."'";*/
											
		$result = $conn->query($sql);

		$conn->close();
		header("Location: dn_add.php?dn_id=$dn_id");
		
	?>
		