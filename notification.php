<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="heezinet" content="web development software development and more">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.notification {
  
  color: white;
  text-decoration: none;
  padding: 5px 6px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}



.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
</head>
<body width="20px" height="10px">

<?php
	if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.php");
        exit();
      }
else{

        include "hzdef_/defhome.php"; 
        $s_cOde=$_SESSION['s_cOde'];
        $u_cat=usercat($conn,$s_cOde);
}
 // end db connection               

      
      $sql3="SELECT * FROM `ap` where status=1";
      $result = $conn->query($sql3);
      $count=$result->num_rows;
      
      
                
if ($count>0 and $u_cat=2){

    echo "<div class=notification>";
    echo "<span> <i class=fa fa-envelope-o></i> </span>";
    echo "<span class=badge>$count</span>";
    echo "</div>";
}

?>

</body>
</html>