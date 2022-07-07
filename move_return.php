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
        include_once('header.php'); 
        $f_id=$_REQUEST['f_id'];  
    }
?>



           

<div class="testbox">
    

      <form action="move_returnup.php" method="post">
        
        <fieldset>
            

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                      <br><h4 class="pageheader-title"><i class="fa fa-bus" aria-hidden="true"></i> Update Field Visit</h4>
                    </div>
                </div>
            </div>

 

            <div class="item">
            <?php  
            if(isset($_REQUEST['msg'] ) ) 
            {
            echo "<input style=border-color:tomato;background-color:#cdff60 type=Text    value='".$_REQUEST['msg']."' disabled >";
             } 

            ?>
            </div>
            
            <input type="hidden" name=f_id value='<?php echo $f_id;   ?>'> 
            
            <div class="item">
            <label for="fname">Return time <span>*</span></label>
            <input id="fname" type="time" name="f_out" value="16:30" ?>
            </div> 
            
            <br>
            <div class="input-group ">
            <input type="submit" value="Update" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>



            </fieldset>
      </form>
   </div>
  
  </body>
</html>