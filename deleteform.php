<?php 
    include 'config.php';
    session_start();
    error_reporting(0);
    include('config.php');
    $user=$_SESSION['username'];
    if(strlen($_SESSION['username'])==0){
        echo "<script>alert('Session Expired, Please Login Again!');</script>";
        echo "<script type='text/javascript'>document.location='login.php';</script>";
    }
    else if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $row=$id;

        $sql="DELETE FROM `complaints` WHERE id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            echo "<script>alert('Record Deleted Successfully');</script>";
            echo "<script>document.location ='tables.php';</script>";
        }
    } 
    else
    {
        echo "<script>alert('You are not allowed to open this page directly');</script>";
        echo "<script>document.location ='tables.php';</script>";
    }
    ;
    
?>