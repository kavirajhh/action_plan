
  <?php // data came from assign_user.php and assign.php

  		include "hzdef_/defhome.php"; 
  		session_start();
		if((!isset($_SESSION['s_cOde'])))
      	{
        header("Location: index.php");
        exit();
      	}

		$id=$_REQUEST['id'];
		
				
		$sql = "delete from dn where dn_id='".$id."'";
		$result = $conn->query($sql);


		$sql2 = "delete from dn_task where dn_id='".$id."'";
		$result2 = $conn->query($sql2);
		
		$conn->close();
		header("Location:my_dn.php");
		//}
		
		
		?>
	

   
