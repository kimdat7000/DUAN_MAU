<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $html_account=' 
                    <a href="index.php?page=myaccount" >'.$username.'</a>
                    <a href="index.php?page=logout" >Thoát</a>';
    }else{
        $html_account='
                    <a href="index.php?page=dangky">Đăng ký</a>
                    <a href="index.php?page=dangnhap">Đăng nhập</a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFINITE TIME</title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>  
    <div class="containerfull">
        <div class="containerfull padd20">
            <div class="container2 ">
                <a href="index.php"><img src="layout/image/logo.png" alt="" ></a>      
                <div class="menu">      
                    <div class="menu2">
                        <a href="index.php">TRANG CHỦ</a>
                        <a href="index.php?page=sanpham">SẢN PHẨM</a>
                        <a href="index.php?page=dichvu">DỊCH VỤ</a>
                        <a href="index.php?page=lienhe">LIÊN HỆ</a>
                        <?=$html_account?>
                    </div>   
                    <div class="menu1">
                        <form action="index.php?page=sanpham" method="post">
                            <input type="text" name="kyw" id="" placeholder="Từ khóa tìm kiếm">
                            <input type="submit" name="timkiem" value="Tìm kiếm">
                        </form>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
    <script src="script.js"></script>
   

  