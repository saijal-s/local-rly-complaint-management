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
    if(isset($_POST['add'])){
        $date=$_POST['date'];
        $nature=$_POST['radios'];
        $staff=$_POST['staff'];
        $status=$_POST['status'];
        $subject=$_POST['subject'];
        $detail=$_POST['detail'];
        $qn=$_POST['q'];
        $ds=$_POST['adate'];

        $filename = $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];
        $filename = time().$filename;
        $img= "form-data/".$filename;
            
        move_uploaded_file($tempname,$img);

        $sql8="INSERT INTO complaints(DDate,Nature,Staff,SStatus,SSubject,Detail,Img,QN,Adate) VALUES('$date','$nature','$staff','$status','$subject','$detail','$img','$QN','$adate')";
        $insertS=mysqli_query($con,$sql8);

        if($insertS){
            echo "<script>alert('New Complaint registered');</script>";
            echo "<script>document.location='form1.php'</script>";
        } else {
            echo $con->error;
        }
        
    }
?>

<html lang="en">
<head>
<title>Form</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
close-Header-part--> 

<!--top-Header-menu-->
<?php include 'header.php' ?>


<!--start-top-serch
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
--close-top-serch--> 

<!--sidebar-menu-->

<?php include 'sidebar.php' ?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>Complaint Form</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Form</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="control-group">
              <label class="control-label">Complaint Date : </label>
              <div class="controls">
                  <div class="span4">
                <input type="text" name="date" data-date="01-02-2021" data-date-format="dd-mm-yyyy" value="01-02-2021" class="datepicker span11">
                <span class="help-block">Date with Formate of(dd-mm-yy)</span> 
            </div>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">Nature : </label>
              <div class="controls">
                <label>
                  <input type="radio" name="radios" value="Mason" />
                  Mason</label>
                <label>
                  <input type="radio" name="radios" value="Carpenter" />
                  Carpenter</label>
                <label>
                  <input type="radio" name="radios" value="Fitter" />
                  Fitter</label>
                <label>
                  <input type="radio" name="radios" value="Other" />
                  Other</label>
              </div>
            </div>
  
            <div class="control-group">
              <label class="control-label">Staff Assigned :</label>
              <div class="controls">
                <input type="text" class="span4" name="staff" placeholder="Staff Assigned" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Attended Date : </label>
              <div class="controls">
                  <div class="span4">
                <input type="text" name="adate"  data-date-format="dd-mm-yyyy" class="datepicker span11">
                <span class="help-block">Date with Formate of(dd-mm-yy)</span> 
            </div>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <input type="text" class="span4" name="status" placeholder="Completed or other" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Qr No./Service Building :</label>
              <div class="controls">
                <input type="text" class="span4" name="q" placeholder="Qr No./Service Building :" />
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Subject :</label>
              <div class="controls">
                <input type="text" class="span4" name="subject" placeholder="Complaint Subject" />
              </div>
            </div>

            
            <div class="control-group">
              <label class="control-label">Description :</label>
              <div class="controls">
                <textarea class="textarea_editor span12" name="detail" rows="6" placeholder="Enter text ..."></textarea>
              </div>
              
            </div>
            
            <span id="campaignImage">Upload an image for campaign : </span>
                        <input type="file" name="file" >
                        <br>
            

            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="add">Add</button>
            </div>
          </form>
        </div>
      </div>
</div></div>

<!--Footer-part-->
<?php include('footer.php') ?>
<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
<?php } ?>
