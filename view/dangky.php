<?php

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
            <h2>ĐĂNG KÝ</h2><br>
            <form action="index.php?page=adduser" method="post">
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
                <div class="row">
                    <div class="col-25">
                    <label for="repassword">Nhập lại mật khẩu:</label>
                    </div>
                    <div class="col-75">
                    <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>  
                <div class="row">
                    <div class="col-25">
                    <label for="email">Email:</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Email">
                    </div>
                </div>  
                <div class="row">
                    <div class="col-25">
                    <label for="phone">Phone:</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="phone" name="phone" placeholder="Số điện thoại">
                    </div>
                </div> 
                <div class="rowsubmit">
                    <input type="submit" name="dangky" value="Đăng ký">
                </div>
            </form>

        </div>

       <!--  <script>
        function check() {
            let a = document.querySelector('input[name="username"]').value;
            let b = document.querySelector('input[name="password"]').value;
            let check = true;

            // Bắt lỗi: Trống dữ liệu
            if (a == "" || b == "") {
                alert('Vui lòng điền đầy đủ dữ liệu');
                return false;
            }

            return check;
        }
        </script> -->
</div>
</section>