<?php
   $html_dssp_new=showsp($dssp_new);
   
   $html_dssp_best=showsp($dssp_best);

   $html_dssp_view=showsp($dssp_view);

?>
<div class="containerfull">
    <img src="layout/image/banner.jpg" alt="">
</div>

<section class="containerfull">
        <div class="container">
            <div class="containerfull mr30">
                <h2>SẢN PHẨM MỚI</h2><br><br>
                <?=$html_dssp_new;?>
            </div>
            <div class="containerfull mr30">
                <h2>SẢN PHẨM BÁN CHẠY</h2><br><br>
                <?=$html_dssp_best;?>
            </div>
            <div class="containerfull mr30">
                <h2>SẢN PHẨM NHIỀU LƯỢT XEM</h2><br><br>
                <?=$html_dssp_view;?>
            </div>

        </div>
</section>


   