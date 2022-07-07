
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="style/myst.css">
</head>
<body>

<div class="container">
  <form action="home.php" method="post">
    <div class="row">
      <h4>Sign in</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="User ID" name="u_id"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
  
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="u_pw"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="submit" value="Sign in" style="background-color: #f0a500;"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    </div>

       <div>
                      <?php  
                        if(isset($_REQUEST['msg'] ) ) 
                          {
                            echo "<input style=background-color:#6B8E23;width:100%;text-align:center; type=Text    value='".$_REQUEST['msg']."' disabled >";
                          } 

                      ?>
        </div>
    
  </form>
</div>
</body>