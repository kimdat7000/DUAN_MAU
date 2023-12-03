<?php
    session_start();
    include_once 'view/header.php';
    include_once '../dao/danhmuc.php';
    include_once '../dao/user.php';

 
    if (isset($_GET['page'])){
        switch ($_GET['page']) { 
            //DANH MỤC  
            case 'danhmuc':
                $danhmuc=show_dm();
                include 'quantri/danhmuc.php';
                break;
            case 'themdanhmuc':
                if ($_POST['name'] == "") {
                    echo "Bạn chưa nhập tên danh muc";
               } else {
                    // Thực hiện thêm người dùng
                    danhmuc_add($_POST['name']);
                }
                //Show khách hàng
                $danhmuc=show_dm();
                include 'quantri/danhmuc.php';
                break;
            case 'danhmucxoa':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    danhmuc_delete($id);
                }
                $danhmuc=show_dm();
                include 'quantri/danhmuc.php';
                break;
            case 'danhmucsua':
                //Show khách hàng
                $danhmuc=show_dm();
                include 'quantri/danhmuc.php';
                break;
            case 'danhmucluu':
                if(isset($_POST["capnhat"])&&($_POST["capnhat"])){
                    $name=$_POST["name"];

                    //Xử lý
                    danhmuc_update($name,$id);

                }
                $danhmuc=show_dm();
                include 'quantri/danhmuc.php';
            
            





            //USER
            case 'user':
                
                $user=show_user();
                include 'quantri/user.php';
                break;

            case 'themuser':
                if ($_POST['username'] == "") {
                    echo "Bạn chưa nhập tên user để thêm";
                } else if ($_POST['password'] == "") {
                    echo "Bạn chưa nhập mật khẩu";
                } else if ($_POST['phone'] == "") {
                    echo "Bạn chưa nhập số điện thoại";
                } else if ($_POST['email'] == "") {
                    echo "Bạn chưa nhập email";
                } else {
                    // Thực hiện thêm người dùng
                    user_add($_POST['username'], $_POST['password'], $_POST['email'], $_POST['diachi'], $_POST['phone'], $_POST['role']);
                }
                //Show khách hàng
                $user=show_user();
                include 'quantri/user.php';
                break;
            case 'userxoa':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    user_delete($id);
                }
                $user=show_user();
                include 'quantri/user.php';
                break;
            

            case 'usersua':
                //Show khách hàng
                $user=show_user();
                include 'quantri/usersua.php';
                break;
    
            case 'userluu':
                if(isset($_POST["capnhat"])&&($_POST["capnhat"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $email=$_POST["email"];
                    $diachi=$_POST["diachi"];
                    $phone=$_POST["phone"];
                    $role=0;
                    $id=$_POST["id"];
                    

                    //Xử lý
                    user_update($username, $password, $email, $diachi, $phone, $role, $id);

                }
                $user=show_user();
                include 'quantri/user.php';
                break;
        }
    }
?>