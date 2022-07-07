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
		$des=$_POST['des_id'];
	
		
				
	
			if (empty($des)) {

				header("Location: add_des.php?msg=Invalied Designation");
				}
			
			else{
			
			
									$sql = "insert into designation  values(";
									$sql.="'".$id."',";
									$sql.="'".$des."'";
								//	$sql.="'".$menu."'";
									$sql.=")";
																		
									$result = $conn->query($sql);


									$conn->close();
									header("Location: add_des.php?msg=Designation $des Created");
									
							
		
		
				}
		
	?>
		