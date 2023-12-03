<?php
require_once 'pdo.php';

function user_insert($username, $password,  $email, $phone){
    $sql = "INSERT INTO user(username, password, email, phone) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $username, $password,  $email, $phone);
}

function checkuser($username,$password){
    $sql= "SELECT * FROM user WHERE username=? AND password=?";
    return pdo_query_one($sql,$username,$password);
    /* if(is_array($kq)&&(count($kq))){
        return $kq["id"];
    }else{
        return 0;
    } */
}
 
function user_update($username, $password, $email, $diachi, $phone,$role, $id){
    $sql = "UPDATE user SET username=?, password=?, email=?, diachi=?, phone=?, role=? WHERE id=?";
    pdo_execute($sql, $username, $password, $email, $diachi, $phone,$role, $id);
}

function get_user($id){
    $sql= "SELECT * FROM user WHERE id=?";
    return pdo_query_one($sql,$id);
}


function user_delete($id){
    $sql = "DELETE FROM user  WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}

function show_user(){
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}

function user_select_by_id($id){
    $sql = "SELECT * FROM user WHERE ma_user=?";
    return pdo_query_one($sql, $id);
}

function user_exist($id){
    $sql = "SELECT count(*) FROM user WHERE $id=?";
    return pdo_query_value($sql, $id) > 0;
}

function user_select_by_role($role){
    $sql = "SELECT * FROM user WHERE role=?";
    return pdo_query($sql, $role);
}

function user_change_password($id, $mat_userau_moi){
    $sql = "UPDATE user SET mat_userau=? WHERE ma_user=?";
    pdo_execute($sql, $mat_userau_moi, $id);
}


function user_add($username, $password, $email,$diachi, $phone, $role){
    $sql = "INSERT INTO user(username, password, email, diachi, phone, role) VALUES (?, ?, ?, ?, ?,?)";
    pdo_execute($sql, $username, $password, $email, $diachi, $phone, $role==1);
}

