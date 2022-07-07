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
           
    }
?>



           

<div class="testbox">
    

      <form action="move_up.php" method="post">
        
        <fieldset>
            

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                      <br><h4 class="pageheader-title"><i class="fa fa-bus" aria-hidden="true"></i> Field Visit</h4>
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
            
            <input type="hidden" name=nic value='<?php echo $s_cOde;   ?>'> 
            
            <div class="row"> 

            <div class="col-half">
                <div class="item">
                <label for="fname">Date<span>*</span></label>
                <input id="date" type="Date" name="f_date"  required value='<?php echo ''; ?>' >
                </div>
            </div>     
            
            <div class="col-half">
                <div class="item">
                <label for="fname">Departure time <span>*</span></label>
                <input id="fname" type="time" name="f_out" value="08:00" >
                </div> 
            </div>

            </div>        

            <div class="item" >
            <label for="fname">Location <span>*</span></label>
            <input id="fname" type="Text" name="f_loc" value='<?php echo ''; ?>' required >
            </div> 
          
            <div class="item">
            <label for="fname">Description <span>*</span></label>
            <input id="fname" type="Text" name="f_des" value='<?php echo ''; ?>' required >
            </div> 
            
            <br>   
            <div class="row">      
            <div class="col-half">
            <div class="item">
            <input id="fname" type="Number" name="f_dis" value='<?php echo ''; ?>' placeholder="Distance">
            </div> 
            </div>

            <div class="col-half">
            <div class="item" >
            <select name='f_status' required >
                <option value=1>Need Approvel</option>
                <option value=0>No Need Approvel</option>
            </select>
            </div>
            </div>
            </div>

            <br>
            <div class="input-group input-group-icon">
            <input type="submit" value="Update" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>



            </fieldset>
      </form>
   </div>
  
  </body>
</html>