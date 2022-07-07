   <?php 
  	include "hzdef_/defhome.php"; 
  	$u_uid=$_POST["u_id"];
	$pw=md5($_POST["u_pw"]);
	$time=date("Y-m-d h-m-s");
	
	
	// logging control
	if($u_uid==""){
				
				header("Location: index.php?msg=Enter Valid User ID");
				$conn->close();
				exit();
				}//end of if
	
	else if(!getuserst($conn,$u_uid))
				{
					header("Location: index.php?msg=Not a registered user");
					$conn->close();
					exit();	
				}
	else if(!pwvalidity($conn,$u_uid,$pw))
				{
					header("Location: index.php?msg=Invalid Password");
					$conn->close();
					exit();
				}

	else if(pwvalidity($conn,$u_uid,$pw))
				{
					session_start();
					
					
					
					$u_cat=usercat($conn,$u_uid);
					/*
					if($u_cat==0)
						{
						$_SESSION['s_cOde']=$u_uid;
						$_SESSION['u_cat']=0;
						header("Location: guest.php");
						$conn->close();
						exit();
						}
					else{*/

						//$menu=getmenu($conn,$des);
						$_SESSION['s_cOde']=$u_uid;
						$_SESSION['des']=$u_cat;
						header("Location:menu.php");
						$conn->close();
						exit();
						
				}

	else 		{

					echo ("An unexpected error occurred. Please try again later");
					//header("Location: index.html");
					$conn->close();
					exit();
				}			
	
 
  ?>    
