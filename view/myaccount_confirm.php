<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $userinfo=get_user($id);
        $_SESSION['s_user']=$userinfo;
        extract($userinfo);
    }
?>
<div class="containerfull">
    <img src="layout/image/banner2.png" alt="">
    <div class="tukhoa"></div>
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <div class='danhmuc'>
                <h2>DÀNH CHO BẠN</h2><br><br>
                <a href="">Thay đổi thông tin</a>
                <a href="">Lịch sử mua hàng</a>
                <a href="">Thoát hệ thống</a>
            </div> 
        </div>
        <div class="boxright">
            <h2>THÔNG TIN ĐÃ ĐƯỢC CẬP NHẬT</h2><br>
                <div class="row">
                    <div class="col-25">
                        <label for="username">Tên đăng nhập:</label>
                    </div>
                    <div class="col-75">
                        <?=$username?>" 
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-75">
                        <?=$email?>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-25">
                        <label for="diachi">Địa chỉ</label>
                    </div>
                    <div class="col-75">
                        <?=$diachi?>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-25">
                        <label for="phone">Phone:</label>
                    </div>
                    <div class="col-75">
                        <?=$phone?>
                    </div>
                </div> 
        </div>
</div>
</section>