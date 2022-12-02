<?php


function check_email($email){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
//    echo $check;
     if($check > 0){
        return true;
        return false;
    }
}

function check_reset_token($reset_token){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}'");
    if($check > 0){
        return true;
        return false;
    }
}

function update_pass($data, $reset_token){
    db_update('tbl_users', $data, "`reset_token` = '{$reset_token}'");
}

function update_reset_token($data, $email){
   return db_update('tbl_users', $data, "`email` = '{$email}'");
}

function add_user($data){
    return db_insert('tbl_users', $data);
    
}

function user_exists($email, $username){
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR `email` = '{$email}'");
    if($check_user > 0){
        return true;
        return false;
    }
    
}

function active_users($active_token){
  return db_update('tbl_users', array('is_active'=> 1), "`active_token` = '{$active_token}'");
   
}

function check_active_token($active_token){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    if($check > 0){
        return true;
        return false;
    }
}
function check_login_db($username, $password){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' && `password` = '{$password}'");
    echo $check;
    if($check > 0){
        return true;
        return false;
    }
}
