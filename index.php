<?php 
error_reporting(0);
session_start();

include("cores/database.php");
include("app-config.php");

if($_SESSION['status']!=''){
    include("cores/component.php");
    include("controllers/pages/$pg/$fl.php");
    include("views/dashboard.php");
}else{
    include("controllers/login/login.php");
    include("views/login.php");
}

?>