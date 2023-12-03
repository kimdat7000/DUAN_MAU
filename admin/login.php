<?php
    session_start();
    include "../dao/pdo.php";
    include "../dao/user.php";
    
    if(isset($_POST["login"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $user=checkuser($username,$password);
        if(isset($user)&&(is_array($user))&&(count($user)>0)){
            extract($user);
            if($role==1){
                $_SESSION['s_user']=$user;
                header('location: index.php');
            }else{
                $tb="Tài khoản này không có quyền đăng nhập vào ADMIN";
            }
        }else{
            $tb="Tài khoản này không tồn tại !";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./form.css">
</head>
<body>
    <div class="box-center">
        <form action="login.php" method="post">
        <div class="imgcontainer">
            <img src="../layout/image/logo.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="username"><b>Tên đăng nhập</b></label>
            <input type="text" placeholder="Nhập tên đăng nhập" name="username" required>

            <label for="password"><b>Mật khẩu:</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" required>

            
            <?php
                if(isset($tb)&&($tb!="")){
                    echo "<h3 style='color:red' >".$tb."</h3>";
                }
            ?>    

            <button type="submit" name="login">ĐĂNG NHẬP</button>
            
        </div>
        </form>
    </div>
</body>
</html>
