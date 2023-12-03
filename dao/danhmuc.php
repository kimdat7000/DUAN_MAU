<?php
require_once 'pdo.php';

/* *
 * Thêm loại mới
 * @param String $name là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danhmuc_add($name){
    $sql = "INSERT INTO danhmuc(name) VALUES(?)";
    pdo_execute($sql, $name);
}
/**
 * Cập nhật tên loại
 * @param int $id là mã loại cần cập nhật
 * @param String $name là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function danhmuc_update($id, $name){
    $sql = "UPDATE danhmuc SET name=? WHERE id=?";
    pdo_execute($sql, $name, $id);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $id là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function danhmuc_delete($id){
    $sql = "DELETE FROM danhmuc WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_all(){
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
    return pdo_query($sql);
}

function showdm($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link='index.php?page=sanpham&iddm='.$id;
        $html_dm.='<a href="'.$link.'">'.$name.'</a>';
    }
    return $html_dm;
}
/**
 * Truy vấn một loại theo mã
 * @param int $id là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_by_id($id){
    $sql = "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql, $id);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $id là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_exist($id){
    $sql = "SELECT count(*) FROM danhmuc WHERE id=?";
    return pdo_query_value($sql, $id) > 0;
}




function get_name_dm($id){
    $sql = "SELECT name FROM danhmuc WHERE id=".$id;
    $kq= pdo_query_one($sql);
    return $kq["name"];
}

function show_dm(){
    $sql= "SELECT * FROM danhmuc";
    return pdo_query($sql);
}


function get_danhmuc($id){
    $sql= "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql,$id);
}

