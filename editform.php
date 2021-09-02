<!DOCTYPE html>
<?php include 'config.php' ;?>
<?php
session_start();
error_reporting(0);
include('config.php');
$user = $_SESSION['username'];
if(strlen($_SESSION['username'])==0)
  { 
      
      echo "<script> alert('Session Expired, Please Login Again!');</script>" ;
      echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else if(isset($_POST['edit']))
    {
    $id =$_POST['id'];
	$row=$id;
	 $sql1="SELECT * FROM complaints WHERE id=$id";
      $result1=mysqli_query($con,$sql1); 
    } else if(isset($_POST['update'])){
    $id=$_POST['id'];
    $row=$id;
    $dt=$_POST['date'];
    $nt=$_POST['radios'];
    $st=$_POST['staff'];
    $stt=$_POST['status'];
    $sb=$_POST['subject'];
    $det=$_POST['detail'];
    $qn=$_POST['qn'];
    $adate=$_POST['adate'];

    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    if($filename=='')
        $img=$_POST['ofile'];
    else
    {
    $filename = time().$filename;
    $img= "form-data/".$filename;
        
    move_uploaded_file($tempname,$img);
    }

    $sql="UPDATE `complaints` SET `DDate`='$dt', `Nature`='$nt',`Staff`='$st',`SStatus`='$stt',`SSubject`='$sb',`Detail`='$det',`Img`='$img',`QN`='$qn',`Adate`='$adate' WHERE id='$id';";
    $result2=mysqli_query($con,$sql);
    $err=$con->error;
    if($result2){
        echo "<script>alert('Complaint Updated Successfully');</script>";
        echo "<script>document.location ='tables.php';</script>";
    }
    }
    else{
        echo"<script>alert('You are not allowed to open this page directly')</script>";
        echo"<script>document.location ='tables.php';</script>";
    }
;?>
<html lang="en">
<head>4
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


<!--start-top-serch-->

<!--close-top-serch--> 

<!--sidebar-menu-->

<?php include 'sidebar.php' ?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Tables</a> <a href="#" class="current">Edit Form</a> </div>
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
            <?php 
            $id =$_POST['id'];
            $row=$id;
             $sql1="SELECT * FROM complaints WHERE id=$id";
              $result1=mysqli_query($con,$sql1); 
                while($row=mysqli_fetch_assoc($result1)){
             ?>
          <form method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Complaint Date : </label>
              <div class="controls">
                  <div class="span4">
                <input type="text" name="date"  data-date-format="dd-mm-yyyy" value="<?php echo $row['DDate']; ?>" class="datepicker span11">
                <span class="help-block">Date with Formate of(dd-mm-yy)</span> 
            </div>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">Nature : </label>
              <div class="controls">
              
              <label>
                  <input type="radio" name="radios" value="Mason" <?php if($row['Nature']=="Mason") echo 'checked="checked"';?> />
                  Mason</label>
                <label>
                
                  <input type="radio" name="radios" value="Carpenter" <?php if($row['Nature']=="Carpenter") echo 'checked="checked"';?>/>
                  Carpenter</label>
                <label>
                  <input type="radio" name="radios" value="Fitter" <?php if($row['Nature']=="Fitter") echo 'checked="checked"';?>/>
                  Fitter</label>
                <label>
                  <input type="radio" name="radios" value="Other" <?php if($row['Nature']=="Other") echo 'checked="checked"';?>/>
                  Other</label>
                  
              </div>
              
            </div>
  
            <div class="control-group">
              <label class="control-label">Staff Assigned :</label>
              <div class="controls">
                <input type="text" value="<?php echo $row['Staff']; ?>" class="span4" name="staff" placeholder="Staff Assigned" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Attended Date : </label>
              <div class="controls">
                  <div class="span4">
                <input type="text" name="adate"  data-date-format="dd-mm-yyyy" value="<?php echo $row['Adate']; ?>" class="datepicker span11">
                <span class="help-block">Date with Formate of(dd-mm-yy)</span> 
            </div>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <input type="text" class="span4" name="status" value="<?php echo $row['SStatus']; ?>" placeholder="Complete or other" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Qr No./Service Building :</label>
              <div class="controls">
                <input type="text" class="span4" name="qn" value="<?php echo $row['QN']; ?>" placeholder="Qr/Service Building" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Subject :</label>
              <div class="controls">
                <input type="text" class="span4" name="subject" value="<?php echo $row['SSubject']; ?>" placeholder=" Subject" />
              </div>
            </div>

            
            <div class="control-group">
              <label class="control-label">Description :</label>
              <div class="controls">
                <textarea class="textarea_editor span12" name="detail" rows="6" placeholder="Enter text ..."><?php echo $row['Detail']; ?></textarea>
              </div>
              
            </div>

            <div class="control-group">
              <label class="control-label">Complaint Copy :</label>
              <div class="controls">
                <img src="<?php echo $row['Img'];?>" style="height:500px;width:500px">
              </div>
              
            </div>
            

            <span id="campaignImage">Copy of Complaint : </span>
                        <input type="file" name="file" >
                        <br>
            
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <input type="hidden" name="ofile" value="<?php echo $row['Img']; ?>">

            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="update">Update</button>
            </div>
          </form>
          <?php }?>
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
