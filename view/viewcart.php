<?php
    $html_cart=viewcart();
    /* $i=1;
    foreach ($_SESSION['giohang'] as $sp) { 
        extract($sp);
        $tt=(Int)$price*(Int)$soluong;
        $html_cart.='<tr>
                        <td>'.$i.'</td>
                        <td><img src="layout/image/'.$img.'" alt="" width="40"></td>
                        <td>'.$name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$soluong.'</td>
                        <td>'.$tt.'</td>
                        <td><a href="#">Xóa</a></td>
                    </tr>';
                    $i++;
    } */
?>
 <div class="containerfull">
        <div class="bgbanner"><h1>GIỎ HÀNG</h1></div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="col9 viewcart">
                <h2>ĐƠN HÀNG</h2>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?=$html_cart?>
            </table>
            <a href="index.php?page=viewcart&del=1">Xóa rỗng đơn hàng</a>
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <h3>Tổng: <?=$tongdonhang?></h3>
            </div>
            <div class="coupon">
                <form action="index.php?page=viewcart&voucher" method="post">
                <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
                <input type="text" placeholder="Nhập voucher">
                <button type="submit" class="apma" >Áp mã</button>
                </form>
            </div>
            <div class="total">
                <h3>Tổng thanh toán: <?=$thanhtoan?></h3>
            </div>
            <button class="thanhtoan">Thanh toán</button>
        </div>


        </div>
    </section>




    <footer class="containerfull padd50">
        Copyright&copy;2023. MSSV + Tên SV
    </footer>

</body>

</html>