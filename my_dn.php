
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
        
}
?>




<?php include_once('header.php'); ?>
    
 
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <br><h4 class="pageheader-title"> .</h4>

          <div class="item">
            <?php  
            if(isset($_REQUEST['msg'] ) ) 
            {
            echo "<input style=border-color:tomato;background-color:#f8da5b type=Text    value='".$_REQUEST['msg']."' disabled >";
             } 

            ?>
      </div>
      
          </div>
        </div>
      </div>

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

<div class="tile mb-4" style="background-color: #faf5e4;">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
              <div class="panel-body"><div>


        <div class="table-responsive">
        <table id="loadData2" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
        <thead>
    
        <tr><th>Year</th><th>Month</th><th>Status</th><th class="datatable-nosort">Action</th></tr>
        </thead>
                        
        <tbody>
        <?php 
          
          
          $sql="SELECT * FROM dn where nic='".$s_cOde."' ";
          

          $result = $conn->query($sql);
          
          while($row = mysqli_fetch_assoc($result)) {
                $dn_id=$row["dn_id"];
                $nic=$row["nic"];
                $year=$row["year"];
                $month=$row["month"];
                $status=$row["status"];
                $st_name=status($conn,$status);
                $remark=$row["remark"];
                if($status==3){$st_name=$st_name .'-'.$remark;}

                  
                
              
                echo "<tr><td>$year</td><td>$month</td><td>$st_name</td>";
                
                echo "<td>";

                ?>

                <div class="dropdown">
                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                
                <?php 
                if($status!=2){  echo "<a class=dropdown-item href=dn_add.php?dn_id=$dn_id >Add</a>";
                                echo "<a class=dropdown-item href=dn_com.php?dn_id=$dn_id >Complete</a>";
                               ?>
                               <a class="dropdown-item" href="dn_del.php?id=<?php echo $dn_id  ?>" onclick="return confirm('Delete AP?')">Delete</a>

                <?php               
                                } 
                ?>
                <a class="dropdown-item" href="dn_view.php?dn_id=<?php echo $dn_id ?>">View</a>
                <a class="dropdown-item" href="dn_download.php?dn_id=<?php echo $dn_id ?>">Download</a>
                
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



<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });
</script>


</body></HTML>
          