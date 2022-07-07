<!DOCTYPE html>
<html>
<head>
	 <?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.html");
        exit();
      }
      include_once "HZDEF_/defhome.php";
      $s_cOde=$_SESSION['s_cOde'];
       if((!isset($_SESSION['des'])))
      {
        header("Location: index.html");
        exit();
      }
      
      $des=$_SESSION['des'];//getdes($conn,$s_cOde);
     // $menu=getmenu($conn,$des);
     
     
   ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="hzstyle/myst.css" type="text/css" rel="stylesheet">
<link href="hzstyle/hzstyle.css" rel="stylesheet" type="text/css">
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
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/validation.css">

    <style>
      @media (max-width: 767px) {
        .hidden-mobile {
          display: none;
        }
      }
    </style>


<!-- for data tables -->

<style type="text/css">
  
  .menuitem {
            overflow: hidden;
            height: 7vh;
            background-color: #f1f1f1;
            
          }

  .menuitem a{

              background-color: #f1f1f1;
              color:#000;
              padding: 2vh;
            }
  .menuitem a:hover {
              height: 7vh;
              background-color: #EC407A;
              color:#fff;
             
              text-decoration: none;
              
              
          }

</style>

</head>
<body style="background-image: url();background-color: #e1e1e1;">
<!------------------------------------------- Start top menu ------------------------------------->
<div class="topnav">
  <nav>
      <a  href='<?php echo $menu.'#pro'; ?>' onclick="openNav()" style="float:left"><img src="images/menu.png" height="30vh" style="padding-left:3vw;padding-right:3vw"></a>
      <a  href="logoff.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
      <a href="user_profile.php"><i class="fa fa-user fa-lg"></i> <?php echo $s_cOde; ?></a>

    </nav>
</div>


<!-- side navigation pannel -->


  







