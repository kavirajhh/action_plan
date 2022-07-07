<head>

  <?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.html");
        exit();
      }
else{
      
        $s_cOde=$_SESSION['s_cOde'];
        
}
?>
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

<link href="hzstyle/myst.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> 

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/jquery.steps.css">
<link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<link rel="stylesheet" href="css/profile_style.css">
<!-- search selector -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/validation.css">
<link rel="stylesheet" type="text/css" href="style/myst.css">
 <style>
      @media (max-width: 767px) {
        .hidden-mobile {
          display: none;
        }
      }
  </style>

  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
</head>
<body>

<div class="container">
<div class="topnav" style="padding: 0;margin: 0;">
  <nav >
      <a  href="menu.php" style="float:left"><img src="images/menu.png" height="30vh" style="padding-left:3vw;padding-right:3vw"></a>

      <a  href="logoff.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
      <a href="user_profile.php"><i class="fa fa-user fa-lg"></i> <?php echo $s_cOde; ?></a>

    </nav>
</div>
<div class="input-group input-group-icon">
            <a  href='#' style="background-color: #8dc6ff;color:#8dc6ff ; width: 100%;box-shadow: 2px 2px 2px gray;"><center>.</center></a>
            </div>