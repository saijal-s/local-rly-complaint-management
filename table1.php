<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->

<!--close-Header-part--> 

<!--top-Header-menu-->


<!--start-top-serch-->

<!--close-top-serch--> 

<!--sidebar-menu-->



  
  
      
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Complete</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" width>
              <thead>
                <tr>
                  <th>Complaint Date</th>
                  <th>Nature </th>
                  <th>Staff Assigned</th>
                  <th>Status</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql1="SELECT * FROM complaints WHERE STRCMP(Status,'completed')=0 ;";
                  $result1=mysqli_query($con,$sql1);
                  while($row=mysqli_fetch_assoc($result1)){
                    echo "<tr>"; 
                 		echo "<td>".$row['Date'];
                 		echo "<td>".$row['Nature'];
                 		echo "<td>".$row['Staff'];
                 		echo "<td>".$row['Status'];
                 		echo "<td>".$row['Subject'];
                 		?>

                     <?php echo"</tr>";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      
    

<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
