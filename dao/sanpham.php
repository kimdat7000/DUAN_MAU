<?php
require_once 'pdo.php';

function sanpham_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
    $sql = "INSERT INTO sanpham(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
}

function sanpham_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
    $sql = "UPDATE sanpham SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
}

function sanpham_delete($ma_hh){
    $sql = "DELETE FROM sanpham WHERE  ma_hh=?";
    if(is_array($ma_hh)){
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_hh);
    }
}

function get_dssp_new($limi){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}

function get_dssp_best($limi){
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp_view($limi){
    $sql = "SELECT * FROM sanpham  ORDER BY view DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp($kyw,$iddm,$limi){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
        $sql .=" AND iddm=".$iddm;
    }
    if($kyw!=""){
        $sql .=" AND name like '%".$kyw."%'";
    }
    $sql .= " ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}

function showsp($dssp){
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        if($bestseller == 1){
            $best='<div class="best"></div>';
        }else{
            $best='';
        }
        $link="index.php?page=sanphamchitiet&id=".$id;
        $html_dssp.='<div class="box25 mr15">
                        '.$best.'
                        <a href="'.$link.'">
                        <img src="layout/image/'.$img.'" alt="">
                        </a>
                        <p>'.$name.'</p>
                        <span class="price">$ '.$price.'  </span>
                        <form action="index.php?page=addcart" method="post">
                            <input type="hidden" name="name" value="'.$name.'">
                            <input type="hidden" name="img" value="'.$img.'">
                            <input type="hidden" name="price" value="'.$price.'">
                            <input type="hidden" name="soluong" value="1">
                            <button class="my-button" type="submit" name="addcart">Đặt hàng</button>
                        </form>
                        </div>';
    }
    return $html_dssp;
}

/* Sản phẩm liên quan */
function get_dssp_lienquan($iddm,$id,$limi){
    $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY id DESC limit ".$limi;
    return pdo_query($sql,$iddm,$id);
}

/* function show_sp(){
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
} */

function get_iddm($id){
    $sql = "SELECT name FROM sanpham WHERE id=?";
    return pdo_query_value($sql,$id);
}

/* Chi tiết sản phẩm */
function get_dssp_chitiet($id){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql,$id);
}

function sanpham_select_by_id($ma_hh){
    $sql = "SELECT * FROM sanpham WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}

function sanpham_exist($ma_hh){
    $sql = "SELECT count(*) FROM sanpham WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function sanpham_tang_so_luot_xem($ma_hh){
    $sql = "UPDATE sanpham SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}

function sanpham_select_top10(){
    $sql = "SELECT * FROM sanpham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function sanpham_select_dac_biet(){
    $sql = "SELECT * FROM sanpham WHERE dac_biet=1";
    return pdo_query($sql);
}

function sanpham_select_by_loai($ma_loai){
    $sql = "SELECT * FROM sanpham WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function sanpham_select_keyword($keyword){
    $sql = "SELECT * FROM sanpham hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
}

/* function sanpham_select_page(){
    if(!isset($_SESSION['page_no'])){
        $_SESSION['page_no'] = 0;
    }
    if(!isset($_SESSION['page_count'])){
        $row_count = pdo_query_value("SELECT count(*) FROM sanpham");
        $_SESSION['page_count'] = ceil($row_count/10.0);
    }
    if(exist_param("page_no")){
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if($_SESSION['page_no'] < 0){
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if($_SESSION['page_no'] >= $_SESSION['page_count']){
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * FROM sanpham ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
    return pdo_query($sql);
} */
?>