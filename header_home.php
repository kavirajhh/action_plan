<!DOCTYPE html>
<html>
<head>
   <?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.php");
        exit();
      }
      include_once "hzdef_/defhome.php";
      $s_cOde=$_SESSION['s_cOde'];
      $des=$_SESSION['des'];//getdes($conn,$s_cOde);
      //$menu=getmenu($conn,$des);
     
     
   ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="style/myst.css" type="text/css" rel="stylesheet">
<link rel="icon" href="images/icon.png" type="image/png">

<!-- for data tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> 

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/jquery.steps.css">

    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">

<!-- profile styles -->
  <link rel="stylesheet" href="css/profile_style.css">
    <!-- search selector -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/validation.css">
<!-- menu  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="hzstyle/menu.css">

<!-- menu -->
    <style>
      @media (max-width: 767px) {
        .hidden-mobile {
          display: none;
        }
      }
    </style>


<!-- for data tables -->
<script>
function openNav() {
  document.getElementById("mysidemenu").style.height = "100%";
  document.getElementById("main").style.marginTop = "0";
  
}

function closeNav() {
  document.getElementById("mysidemenu").style.height = "0";
  document.getElementById("main").style.marginTop= "0";
 
}
</script>
<style type="text/css">
  
 
.menu {
  
  width: 100%;
  position: relative;
  z-index: 1;
  right: 0;
  overflow-x: hidden;
  padding-top: 0px;
  float: left;

}
@media screen and (max-width: 600px) {
  .menu {
    width: 100%;
    display: block;
    margin-bottom: 0px;
  }
}

</style>
 <style> 
.container {
  max-width: 35em;
  padding: 1em 3em 2em 3em;
  margin: 0em auto;
  background-color: #fff;
  border-radius: 4.2px;
  box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
  position: relative;
}

 </style>

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

<?php
$u_cat=usercat($conn,$s_cOde);

      
      $sql3="SELECT * FROM `ap` where status=1";
      $result = $conn->query($sql3);
      $count=$result->num_rows;

      $sql5="SELECT * FROM `dn` where status=1";
      $result5 = $conn->query($sql5);
      $count5=$result5->num_rows;

      $sql4="SELECT * FROM `move` where f_status=1";
      $result4 = $conn->query($sql4);
      $movements=$result4->num_rows;

?>
</head>
<body>
<div class="container" >
<!------------------------------------------- Start top menu ------------------------------------->
<div class="topnav" style="padding: 0;margin: 0;">
  <nav >
      <a  href="#" style="float:left"><img src="images/menu.png" height="30vh" style="padding-left:3vw;padding-right:3vw"></a>

      <a  href="logoff.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
      <a href="user_profile.php"><i class="fa fa-user fa-lg"></i> <?php echo $s_cOde; ?></a>

    </nav>
</div>


<!-- side navigation pannel -->

 <div class="menu" id="mysidemenu" style=" box-shadow: 2px 2px 2px #a1a1a1;" >
            <ul>
                <li class="item" id="profile">
                   <a href='#' class="btn"><i class="fa fa-home"></i> Home</a>
                </li>

                <li class="item" id="acc">
                    <a href="#acc" class="btn"><i class="fa fa-calendar"></i> Advance program</a>
                    <div class="smenu">
                            <?php 
                            /*if($des<2){
                              echo "<a href=ap_not_approve.php>View Not Approved</a>";
                              echo "<a href=ap_view_all.php>View AP</a>";
                            }*/
                             echo "<a href=ap.php>New Advance program</a>";
                             echo "<a href=my_ap.php>My Advance program</a>";

                            ?>

                    </div>
                </li>

                <?php if (($count>0)&&($u_cat==1)){
                    echo "<li class=item id=pro>";
                    echo "<a href=#pro class=btn><i class='fab fa-gg'></i> AP Admin"; 
                                    echo "<div class=notification>";
                                    echo "<span> <i class=fa fa-envelope-o></i> </span>";
                                    echo "<span class=badge>$count</span>";
                                    echo "</div>";
                    echo "</a>";
                    
                    echo "<div class=smenu>";
                    
                            if($des==1 ){
                              echo "<a href=ap_not_approve.php>View Not Approved AP</a>";

                              
                            }
                             if($des==1 || $des==3){
                              
                              echo "<a href=ap_view_all.php>View AP</a>";
                              
                            }
                           
                     
                    echo "</div>";
                    echo "</li>";

                }
                ?>


                <li class="item" id="off">
                    <a href="#off" class="btn"><i class="fa fa-bus"></i> Field Visit
                        <?php if (($movements>0)&&($u_cat==1)){

                                    echo "<div class=notification>";
                                    echo "<span> <i class=fa fa-envelope-o></i> </span>";
                                    echo "<span class=badge>$movements</span>";
                                    echo "</div>";
                        }  ?>

                    </a>

                    <div class="smenu">

                         <?php 
                       
                            echo "<a href=move.php>Field Visit</a>";
                           
                            if($des==1 ){
                              echo "<a href=move_not_approve.php>Approve Field Visits</a>";
                                }
                            echo "<a href=move_view.php>My Field Visits</a>";
                        ?>
                        <!--
                        <a href="view_officer_up.php">View officers</a>
                        <a href="view_officer_edu.php">Officers Academic Info </a>
                        -->
                    </div>
                </li>



                <li class="item" id="_pro">
                    <a href="#_pro" class="btn" ><i class="fa fa-cogs"></i> CP Diary
                      <?php if (($count5>0)&&($u_cat==1)){

                                    echo "<div class=notification>";
                                    echo "<span> <i class=fa fa-envelope-o></i> </span>";
                                    echo "<span class=badge>$count5</span>";
                                    echo "</div>";
                        }  ?>

                    </a>
                    <div class="smenu">
                         <?php 
                           
                             echo "<a href=dn.php>New CP</a>";
                             echo "<a href=my_dn.php>My CP</a>";
                             if($des==1 ){
                              echo "<a href=dn_not_approve.php>View Not Approved CP</a>";
                                }
                            ?>
                    </div>
                </li>

                 <li class="item" id="inst">
                    <a href="#inst" class="btn"><i class="fa fa-bank"></i> Leave</a>
                    <div class="smenu">
                      <?php
                      if($des==4){
                        echo "<a href='add_inst_home.php'>My Institutes </a>";
                      }
                        ?>
                    </div>
                </li>


              <?php if (($u_cat==3)||($u_cat==1)){
                    echo "<li class=item id=view>";
                    echo "<a href=#view class=btn><i class='fa fa-search'></i>View</a>"; 
                    echo "<div class=smenu>";
                              echo "<a href=ap_view_all.php>View AP</a>";
                              echo "<a href=dn_view_all.php>View CP</a>";
                              echo "<a href=move_view_all.php>View Field Visits</a>";
 
                    echo "</div>";
                    echo "</li>";

                }
                ?>

                

                

                <li class="item" id="settings">
                    <a href="#settings" class="btn"><i class="fa fa-cog"></i> Admin</a>
                    <div class="smenu">

                      <?php 
                        if($des==1 || $des==3){
                           echo "<a href=user.php>Create Account</a>";
                           echo "<a href=add_des.php>Add Designation</a>";
                           echo "<a href=esign.php>e-signature</a>";

                            }
                            
                        ?>

                        

                    </div>
                </li>

                

                

                <li class="item">
                    <a href="logoff.php" class="btn"><i class="fa fa-sign-out-alt"></i> Logout</a>
                </li>
                
            </ul>
        </div>

</div> <!-- End side navigation pannel -->

 







