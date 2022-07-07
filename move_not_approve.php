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

        if($u_cat!=1){
            header("Location: menu.php");
            exit();
        }
        else{
        include_once('header.php'); 
            }
        }
    
      
  ?>
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
  
  
  
       
     

<body>

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
    
      <tr>
        <th>Date</th>
        <th>Departure time</th>
        <th>Name</th>
        <th>Designation</th>
        <TH>Location</TH>
        <TH>Description</TH>
    
    <th class="datatable-nosort">Action</th>
      </tr>
      </thead>
                        
      <tbody>
    <?php 
          
          
          $sql="SELECT * FROM move where f_status='1' ";
          

          $result = $conn->query($sql);
          
          while($row = mysqli_fetch_assoc($result)) {
                $f_id=$row["f_id"];
                $nic=$row["nic"];
                $uname=user_name($conn,$nic);
                $des_id=user_des($conn,$nic);
                $des=desname_id($conn,$des_id);
                $f_loc=$row["f_loc"];
                $f_des=$row["f_des"];
                $f_date=$row["f_date"];
                $f_out=$row["f_out"];
                
               

                  
                
              
                echo "<tr><td>$f_date</td><td>$f_out</td><td>$uname</td><td>$des</td><td>$f_loc</td><td>$f_des</td>";
                
                echo "<td>";

                ?>

                <div class="dropdown">
                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                
                <a class="dropdown-item" href="move_approve.php?f_id=<?php echo $f_id  ?>"><i class="fa fa-check"></i> Approve</a>
                <a class="dropdown-item" href="move_reject.php?f_id=<?php echo $f_id ?>"><i class="fa fa-close"></i> Reject</a>
                              </div>
                </div>

                <?php
                echo "</td>";


                echo "</tr>";
                  
                
                  
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
</div>


<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });
</script>


</body>
          