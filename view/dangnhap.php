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
            <h2>ĐĂNG NHẬP</h2><br>
                <h3 style="color:red">
                    <?php
                    if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
                        echo $_SESSION['tb_dangnhap'];
                        unset($_SESSION['tb_dangnhap']);
                    }

                    ?>
                </h3>

            <form action="index.php?page=login" method="post">
                <div class="row">
                    <div class="col-25">
                    <label for="username">Tên đăng nhập:</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                    <label for="password">Mật khẩu:</label>
                    </div>
                    <div class="col-75">
                    <input type="password" id="password" name="password" placeholder="Mật khẩu">
                    </div>
                </div>  
                <div class="rowsubmit">
                    <input type="submit" name="dangnhap" value="Đăng nhập">
                </div>
            </form>

        </div>
</div>
</section>