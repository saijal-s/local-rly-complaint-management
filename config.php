<?php

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="newproject";

$con = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);

if($con->connect_error)
{
    die("connection failed : ".$con->connect_error);
}

$url = 'localhost/newproject'; ?>