<?php

    session_start();
    ob_start();
    if(isset($_SESSION['s_user'])&&(is_array($_SESSION['s_user']))&&(count($_SESSION['s_user'])>0)){
        $admin=$_SESSION['s_user'];
        header('location: admin.php');
    }else{
        header('location: login.php');
    }

?>
