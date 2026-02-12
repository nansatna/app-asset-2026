<?php 
error_reporting(0);
session_start();


if($_SESSION['status']!=''){
    include("cores/component.php");
    include('views/dashboard.php');
    
}else{
    include('views/login.php');
    
}

?>