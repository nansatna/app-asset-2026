<?php 
    error_reporting(0);
    session_start();

    include("cores/database.php");
    include("cores/component.php");
    include("app-config.php");

    if($_SESSION['Status']!=''){
        
        $pg = inputGet('pg'); //page
        $fl = inputGet('fl'); //file
        $ak = inputGet('ak'); //aksi

        include("controllers/pages/$pg/$fl.php");
        include("views/dashboard.php");
    }else{
        include("controllers/login/login.php");
        include("views/login.php");
    }

?>