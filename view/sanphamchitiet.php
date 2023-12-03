<?php
    $html_dm=showdm($dsdm);

    $html_sp_lienquan=showsp($dssp_lienquan);

    extract($spchitiet);

    
?>
<div class="containerfull">
    <img src="layout/image/banner2.png" alt="">
    <div class="tukhoa"></div>
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <div class='danhmuc'>
                <h2>DANH MỤC</h2><br><br>
                <?=$html_dm;?>
            </div> 
        </div>
        <div class="boxright">
            <h2>SẢN PHẨM CHI TIỂT</h2><br>
            <div class="containerfull mr30">
                <div class="col6 imgchitiet">
                    <img src="layout/image/<?=$img?>" alt="">
                </div>
                <div class="col6 textchitiet">
                    <h3><?=$name?></h3>
                
                    <p>$ <?=$price?></p>
                    

                    <form action="index.php?page=addcart" method="post">
                            <input type="hidden" name="name" value="<?=$name?>">
                            <input type="hidden" name="img" value="<?=$img?>">
                            <input type="hidden" name="price" value="<?=$price?>">
                            <input type="number" name="soluong" min="1" id="" value="1" max="10">
                            <button class="my-button" type="submit" name="addcart">Đặt hàng</button>
                    </form>
                </div>

            </div>
            <hr>
            <h2>SẢN PHẨM LIÊN QUAN</h2>
            <?= $html_sp_lienquan?>
        </div>


    </div>
</section>
