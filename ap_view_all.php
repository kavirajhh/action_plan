
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

        if($u_cat!=1&&$u_cat!=3){
            header("Location: menu.php");
            exit();
        }
        else{
        include_once('header.php'); 
            }
        }
?>




<?php include_once('header.php'); ?>
    
 
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <br><p class="pageheader-title">Advance Programs</p>
          </div>
        </div>
      </div>
<style> 
.container {
  max-width: 70em;
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
                        <option value='January'>January</option>
                        <option value='February'>February</option>
                        <option value='March'>March</option>
                        <option value='April'>April</option>
                        <option value='May'>May</option>
                        <option value='June'>June</option>
                        <option value='July'>July</option>
                        <option value='August'>August</option>
                        <option value='September'>September</option>
                        <option value='October'>October</option>
                        <option value='November'>November</option>
                        <option value='December'>December</option>
                        </select>
                       <!--  <input type="date" name="to_date" day='to_date' value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" required> -->
                    
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
    
        <tr><th>AP No</th><th>Year / Month</th><th>Name</th><th>Designation</th><th>Status</th><th class="datatable-nosort">Action</th></tr>
        </thead>
                        
        <tbody>
        <?php 
           
           if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date']; 
          
          $sql="SELECT * FROM ap where status>0 and year='".$from_date."' and month='".$to_date."'";
          

          $result = $conn->query($sql);
          
          while($row = mysqli_fetch_assoc($result)) {
                $ap_id=$row["ap_id"];
                $nic=$row["nic"];
                $uname=user_name($conn,$nic);
                $des_id=user_des($conn,$nic);
                $des=desname_id($conn,$des_id);
                $year=$row["year"];
                $month=$row["month"];
                $status=$row["status"];
                $st_name=status($conn,$status);
                // Data capture to approved AP
                if($status==2){
                    $app_by=$row["app_by"];
                    $app_date=$row["app_date"];
                    $app_name=user_name($conn,$app_by);
                    $app_des_id=user_des($conn,$app_by);
                    $app_des=desname_id($conn,$app_des_id);
                    $st_name=$st_name.' By '.$app_name.'('.$app_des.') <br> On '.$app_date;

                }
                  
                
              
                echo "<tr><td>$ap_id</td><td>$year / $month</td><td>$uname</td><td>$des</td><td>$st_name</td>";
                
                echo "<td>";

                ?>

                <div class="dropdown">
                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                
               
                <a class="dropdown-item" href="ap_view.php?ap_id=<?php echo $ap_id ?>">View</a>
                <a class="dropdown-item" href="ap_download.php?ap_id=<?php echo $ap_id ?>">Download</a>
                <!-- <a class="dropdown-item" href="ap_del.php?id=<?php echo $ap_id  ?>" onclick="return confirm('Delete AP?')">Delete</a>  -->            


                              </div>
                </div>

                <?php
                echo "</td>";


                echo "</tr>";
                
                  
                
                  
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
          