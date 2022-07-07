
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
        include_once('header.php'); 
            
        }
?>


 
    
 
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <br><h4 class="pageheader-title">Field Visits</h4>
          </div>
        </div>
      </div>
<style> 
.container {
  max-width: 90em;
  padding: 1em 3em 2em 3em;
  margin: 0em auto;
  background-color: #fff;
  border-radius: 4.2px;
  box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
  position: relative;
}

 </style>

 <form action="" method="GET">
                <div class="form-row">
                    <div class="form-group col-lg-2">
                        <label for=""></label>
                        <input type="Number" name="from_date" id='from_date'  value="2022" class="form-control" required >
                    </div>

                    <div class="form-group col-lg-2">
                    <label for=""></label>

                        <select name="to_date" required>
                        <option value=''>Select a month</option>
                        <option value='01'>January</option>
                        <option value='02'>February</option>
                        <option value='03'>March</option>
                        <option value='04'>April</option>
                        <option value='05'>May</option>
                        <option value='06'>June</option>
                        <option value='07'>July</option>
                        <option value='08'>August</option>
                        <option value='09'>September</option>
                        <option value='10'>October</option>
                        <option value='11'>November</option>
                        <option value='12'>December</option>
                        </select>
                       <!--  <input type="date" name="to_date" day='to_date' value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" required> -->
                    
                    </div>
                    
                    <div class="form-group col-lg-2">
                    <label for=""></label>

                        <select name="user" required>
                        <option value=''>Select a user</option>  
                        <?php
                        $sql="SELECT * FROM profile order by u_name_ini";
                        $result = $conn->query($sql);
          
                        while($row = mysqli_fetch_assoc($result)) {
                            $nic=$row["u_nic"];
                            $name=$row["u_name_ini"];
                            if($name==''){$name=$nic;}
                            echo "<option value=$nic>$name</option>";

                        }

                        ?>



                    </select>
                    </div>

                    <div class="form-group col-lg-3">
                    <label></label> 
                    <input type="submit" class="btn btn-primary" Value=search height="100%">
                    </div>
                </div>
            </form>
  <style type="text/css">
  table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
  
  </style>
  
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
              <div class="panel-body"><div>


        <div class="table-responsive">
        <table id="loadData2" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
        <thead>
    
        <tr><th>Name</th><th>Date </th><th>Departure time</th><th>Return time</th><th>Location</th><th>Description</th><th>Distance</th><th>Status</th></tr>
        </thead>
                        
        <tbody>
        <?php 
           
           if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['user']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date']; 
                                $month=$from_date.'-'.$to_date;
                                $user=$_GET['user']; 
          
          $sql="SELECT * FROM move where nic='".$user."' and f_date like '".$month."%'  ";
          $result = $conn->query($sql);
          
          while($row = mysqli_fetch_assoc($result)) {
                $f_id=$row["f_id"];
                $nic=$row["nic"];
                $uname=user_name($conn,$nic);
               // $des_id=user_des($conn,$nic);
               // $des=desname_id($conn,$des_id);
                $f_date=$row["f_date"];
                $f_out=$row["f_out"];
                $f_back=$row["f_back"];
                $f_loc=$row["f_loc"];
                $f_des=$row["f_des"];
                $f_dis=$row["f_dis"];
                $f_status=$row["f_status"];
                $st_name=status($conn,$f_status);
                // Data capture to approved AP
                if($f_status==2||$f_status==3){
                    $app_by=$row["app_by"];
                    $app_date=$row["app_date"];
                    $app_name=user_name($conn,$app_by);
                    $app_des_id=user_des($conn,$app_by);
                    $app_des=desname_id($conn,$app_des_id);
                    $st_name=$st_name.' By '.$app_name.'('.$app_des.') <br> On '.$app_date;

                }
                  
                
              
                echo "<tr><td>$uname</td><td>$f_date</td><td>$f_out</td><td>$f_back</td><td>$f_loc</td><td>$f_des</td><td>$f_dis (km)</td><td>$st_name</td></tr>";
                
                

               
                


                echo "";
                
                  
                
                  
            }
            
            
          }
            
        ?>
       
     </tbody>
    </table>
    </div>

    </div>            
  </div>
</div>
</div>

</div>



<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });
</script>


</body></HTML>
          