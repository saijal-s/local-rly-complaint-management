<!DOCTYPE html>

<?php include 'config.php' ;?>
<?php
session_start();
error_reporting(0);
include('config.php');
$user=$_SESSION['username'];
if(strlen($_SESSION['username'])==0)
  { 
      echo "<script> alert('Session Expired, Please Login Again!');</script>" ;
      echo "<script type='text/javascript'> document.location ='login.php'; </script>";
} else{
?>

<html lang="en">
<head>
<title>Complaint | Dashboard</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Main Page</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <?php 
          $sql1="SELECT COUNT(id) AS id FROM complaints WHERE STRCMP(Nature,'mason')=0;";
          $result1=mysqli_query($con,$sql1);
          $row=mysqli_fetch_assoc($result1);?>
        
        <li class="bg_lb"> <a href="masont.php"> <i class="icon-th-large"></i> <span class="label label-success"><?php echo $row['id']; ?></span>Mason</a> </li>
        <?php
          $sql2="SELECT COUNT(id) AS id FROM complaints WHERE STRCMP(Nature,'carpenter')=0;";
          $result2=mysqli_query($con,$sql2);
          $row=mysqli_fetch_assoc($result2);
         ?>
        
        <li class="bg_ly"> <a href="carpt.php"> <i class="icon-th-large"></i><span class="label label-success"><?php echo $row['id']; ?></span>Carpenter</a> </li>
        <?php
          $sql3="SELECT COUNT(id) AS id FROM complaints WHERE STRCMP(Nature,'fitter')=0;";
          $result3=mysqli_query($con,$sql3);
          $row=mysqli_fetch_assoc($result3);
         ?>
        <li class="bg_lo"> <a href="fitt.php"> <i class="icon-th-large"></i><span class="label label-success"><?php echo $row['id']; ?></span>Fitter</a> </li>
        <?php
          $sql4="SELECT COUNT(id) AS id FROM complaints WHERE STRCMP(Nature,'other')=0;";
          $result4=mysqli_query($con,$sql4);
          $row=mysqli_fetch_assoc($result4);
         ?>
        <li class="bg_ls"> <a href="othern.php"> <i class="icon-th-large"></i><span class="label label-success"><?php echo $row['id']; ?></span>Other</a> </li>
        
      <!--   <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>
-->
      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
              <div class="chart"></div>
            </div>
            <div class="span3">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>Total Complaints</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>Completed Complaints</small></li>
                <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total Shop</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
End-Chart-box--> 
    <hr/>
    
    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5><a href='othert.php'>Incomplete</a></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" width>
              <thead>
                <tr>
                  <th>Complaint Date</th>
                  <th>Nature </th>
                  <th>Staff Assigned</th>
                  <th>Attended Date</th>
                  <th>Status</th>
                  <th>Qr No./Service Building</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql1="SELECT * FROM complaints WHERE STRCMP(SStatus,'completed')!=0 AND STRCMP(SStatus,'zonal')!=0 ;";
                  $result1=mysqli_query($con,$sql1);
                  while($row=mysqli_fetch_assoc($result1)){
                    echo "<tr>"; 
                    echo "<td>".$row['DDate'];
                    echo "<td>".$row['Nature'];
                    echo "<td>".$row['Staff'];
                   echo "<td>".$row['Adate'];
                    echo "<td>".$row['SStatus'];
                   echo "<td>".$row['QN'];
                    echo "<td>".$row['SSubject'];
                 		?>

                     <?php echo"</tr>";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
    <hr/>
    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5><a href='compt.php'>Complete</a></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" width>
              <thead>
              <tr>
                  <th>Complaint Date</th>
                  <th>Nature </th>
                  <th>Staff Assigned</th>
                  <th>Attended Date</th>
                  <th>Status</th>
                  <th>Qr No./Service Building</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql1="SELECT * FROM complaints WHERE STRCMP(SStatus,'completed')=0 ;";
                  $result1=mysqli_query($con,$sql1);
                  while($row=mysqli_fetch_assoc($result1)){
                    echo "<tr>"; 
                    echo "<td>".$row['DDate'];
                    echo "<td>".$row['Nature'];
                    echo "<td>".$row['Staff'];
                   echo "<td>".$row['Adate'];
                    echo "<td>".$row['SStatus'];
                   echo "<td>".$row['QN'];
                    echo "<td>".$row['SSubject'];
                 		?>

                     <?php echo"</tr>";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        </div>

        <hr/>
    
    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5><a href='zonalt.php'>Zonal Table</a></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" width>
              <thead>
              <tr>
                  <th>Complaint Date</th>
                  <th>Nature </th>
                  <th>Staff Assigned</th>
                  <th>Attended Date</th>
                  <th>Status</th>
                  <th>Qr No./Service Building</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql1="SELECT * FROM complaints WHERE STRCMP(SStatus,'Zonal')=0 ;";
                  $result1=mysqli_query($con,$sql1);
                  while($row=mysqli_fetch_assoc($result1)){
                    echo "<tr>"; 
                    echo "<td>".$row['DDate'];
                    echo "<td>".$row['Nature'];
                    echo "<td>".$row['Staff'];
                   echo "<td>".$row['Adate'];
                    echo "<td>".$row['SStatus'];
                   echo "<td>".$row['QN'];
                    echo "<td>".$row['SSubject'];
                 		?>

                     <?php echo"</tr>";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
    
  </div>
  
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<?php include('footer.php') ?>

<!--end-Footer-part-->

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php } ?>

