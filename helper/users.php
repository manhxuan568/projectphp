<?php

function check_Login($username, $password){
//    global $list_User;
//    foreach ($list_User as $user){
        if($username == $user['username'] && md5($password) == $user['password']){
          return TRUE;
           return FALSE; 
//        }
    }
   
}

function is_login(){
   if(isset($_SESSION['is_login'])){
        return true;
        return false;
    }
}

function user_login(){
    if(!empty($_SESSION['user_login'])){
        return $_SESSION['user_login'];
    }
    return false;
}

function info_user($field= 'id'){
global $list_User;
     if(isset($_SESSION['is_login'])){
     foreach ($list_User as $user){
         if($_SESSION['user_login'] == $user['username']){
             if(array_key_exists($field, $user)){
             return $user[$field];   }
         }
     }
     }
     return false;
}


function cart_order_succ($label_fileld){
    if(!empty($_SESSION[$label_fileld])){
        return $_SESSION[$label_fileld];
    }
    return false;
}









