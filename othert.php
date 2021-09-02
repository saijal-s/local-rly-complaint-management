

<!DOCTYPE html>


<?php include 'config.php' ;?>
<?php
session_start();
error_reporting(0);
include('config.php');
$user=$_SESSION['username'];if(strlen($_SESSION['username'])==0)
{ 
    echo "<script> alert('Session Expired, Please Login Again!');</script>" ;
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
} else{
?>

<html lang="en">
<head>
<title>Other resouces</title>
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
<?php include 'header.php' ?>
<!--sidebar-menu-->
<?php include 'sidebar.php' ?>
<!--sidebar-menu-->

<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
 
<!--End-breadcrumbs-->

<!--start-top-serch-->

<!--close-top-serch--> 

<!--sidebar-menu-->



  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Other Resources Required Complaint Table</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
      
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Other</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" width>
              <thead>
                <tr>
                <th>S No. </th>
                  <th>Complaint Date</th>
                  <th>Nature </th>
                  <th>Staff Assigned</th>
                  <th>Attended Date</th>
                  <th>Status</th>
                  <th>Qr No./Service Building</th>
                  <th>Subject</th>
                  <th>Detail</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql1="SELECT * FROM complaints WHERE STRCMP(SStatus,'completed')!=0 AND STRCMP(SStatus,'zonal')!=0;";
                  $result1=mysqli_query($con,$sql1);
                  $num=1;
                  while($row=mysqli_fetch_assoc($result1)){
                    echo "<tr>"; 
                    echo "<td>".$num;
                    echo "<td>".$row['DDate'];
                    echo "<td>".$row['Nature'];
                    echo "<td>".$row['Staff'];
                   echo "<td>".$row['Adate'];
                    echo "<td>".$row['SStatus'];
                   echo "<td>".$row['QN'];
                    echo "<td>".$row['SSubject'];
                   echo "<td>".$row['Detail'];
                   echo "<td><a href='".$row['Img']."' target='_blank'>View Image</a>";
                     $num++;
                 		?>
                    <td>
                      <form method='post' action='editform.php' >
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>"></input>
                        <button class="btn btn-primary btn-mini" type="submit" name="edit">Edit</button>
                      </form>
                    </td>
                    <td>
                      <form method='post' action='deleteform.php'>
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>"></input>
                        <button class="btn btn-info btn-mini" type="submit" name="delete">Delete</button>
                      </form>
                    </td>
                     <?php echo"</tr>";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        
      </div>
    </div>
  </div>

<!--Footer-part-->
<?php include('footer.php') ?>
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
<?php }?>
