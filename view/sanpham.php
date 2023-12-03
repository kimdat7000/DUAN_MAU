<?php
    $html_dm=showdm($dsdm);
    
    $html_dssp=showsp($dssp);
    /* foreach ($dssp as $sp) {
        extract($sp);
        $html_dssp .='<div class="box25 mr15 mb">
                        <img src="layout/image/'.$img.'" alt="">
                        <p>'.$name.'</p>
                        <span class="price">$ '.$price.'</span>
                        <button class="my-button">Đặt hàng</button>
                    </div>';
    } */

    if($titlepage!="") $title=$titlepage;
    else $title="SẢN PHẨM";


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
                <h2><?=$title?></h2><br>
                <div class="containerfull mr30">
                    <?=$html_dssp;?>
                </div>
            </div>
        </div>
    </section>