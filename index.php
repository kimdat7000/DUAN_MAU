<?php
session_start();
ob_start();
if(!isset($_SESSION["giohang"])){
    $_SESSION["giohang"]=[];
}
    include 'dao/pdo.php';
    include 'dao/sanpham.php';
    include 'dao/danhmuc.php';
    include 'dao/user.php';
    include 'dao/giohang.php';


    include 'view/header.php';


    $dssp_new=get_dssp_new(4);
    $dssp_best=get_dssp_best(4);
    $dssp_view=get_dssp_view(4);

    if(!isset($_GET['page'])){
        include 'view/home.php';
    }else{
        switch($_GET['page']){
            case 'sanpham':
                $dsdm=danhmuc_select_all();

                $kyw="";
                $titlepage="";    

                If(!isset($_GET['iddm'])){
                    $iddm=0;
                    $titlepage="";
                }else{
                    $iddm=$_GET['iddm'];
                    $titlepage=get_name_dm($iddm);
                }
                //Kiểm trả form search
                if(isset($_POST["timkiem"])&&($_POST["timkiem"])){
                    $kyw=$_POST["kyw"];
                    $titlepage="KẾT QUẢ TÌM KIẾM VỚI TỪ KHÓA : <span>".$kyw."</span>";
                }

                $dssp=get_dssp($kyw,$iddm,8);
                include 'view/sanpham.php';
                break;

            case 'sanphamchitiet':
                if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $spchitiet=get_dssp_chitiet($id);
                        $dsdm=danhmuc_select_all();
                        $iddm=$spchitiet['iddm'];
                        $dssp_lienquan  =get_dssp_lienquan($iddm,$id,4);
                        include "view/sanphamchitiet.php";
                }else{
                        include "view/home.php";
                }
                break;


            case 'dangky':
                include 'view/dangky.php';
                break;
            case 'adduser':
                if(isset($_POST["dangky"])&&($_POST["dangky"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $email=$_POST["email"];
                    $phone=$_POST["phone"];

                    //Xử lý
                    user_insert($username, $password, $email, $phone);
                }
                include 'view/dangnhap.php';
                break;
            case 'dangnhap':               
                include 'view/dangnhap.php';
                break;
            case 'login':
                //input
                if(isset($_POST["dangnhap"])&&($_POST["dangnhap"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
            
                //Xử lý
                $kq=checkuser($username,$password);
                if(is_array($kq)&&(count($kq))){
                    $_SESSION['s_user']=$kq;
                    header('location: index.php');
                }else{
                    $tb="Tài khoản hoặc mật khẩu không tồn tại !";
                    $_SESSION['tb_dangnhap']=$tb;
                    header('location: index.php?page=dangnhap');
                }
                //output
              
                }
                break;
            case 'logout':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
                    unset($_SESSION['s_user']);
                }        
                header('location: index.php');
                break;

            case 'myaccount':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
                    include 'view/myaccount.php';
                }
                
                break;
            case 'updateuser':
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

                    include 'view/myaccount_confirm.php';
                }
                break;


            case 'addcart':
                if(isset($_POST["addcart"])){
                    $name=$_POST["name"];
                    $img=$_POST["img"];
                    $price=$_POST["price"];
                    $soluong=$_POST["soluong"];

                    $sp=array("name"=>$name,"img"=>$img, "price"=>$price, "soluong"=>$soluong);
                    array_push($_SESSION["giohang"],$sp);
                    header('location: index.php?page=viewcart');
                }
                break;
            case 'viewcart':
                if(isset($_GET['del'])&&($_GET['del']==1)){
                        unset($_SESSION["giohang"]);
                        // $_SESSION["giohang"]=[];
                        header('location: index.php');
                }else{
                        if(isset($_SESSION["giohang"])){
                            $tongdonhang=get_tongdonhang();              
                        }
                            $giatrivoucher=0;
                        if(isset($_GET['voucher'])&&($_GET['voucher']==1)){
                            $tongdonhang=$_POST['tongdonhang'];
                            $mavoucher=$_POST['mavoucher'];
    
                            $giatrivoucher=10;
                            
                        }
                        $thanhtoan=$tongdonhang - $giatrivoucher;
                        include 'view/viewcart.php';
                }
                break;
            default:
                include 'view/home.php';
                break;
        }
    }

    include 'view/footer.php';
?>