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

function get_pagging($num_page,$page,$base_url=""){
   
    $str_pagging = "<ul class='pagging'>";
     if($page > 1){
         $page_prev = $page-1;
         $str_pagging.= "<li><a href= \"{$base_url}&page={$page_prev}\">Trước</a></li>";
     }
     for($i=1; $i <= $num_page; $i++){
         $active ="";
         if($i==$page)$active = "class='active'";
     $str_pagging.= " <li {$active}><a href= \"{$base_url}&page={$i}\">{$i}</a></li>";
     } 
    if($page < $num_page){
         $page_next = $page + 1;
         $str_pagging.= "<li><a href= \"{$base_url}&page={$page_next}\">Sau</a></li>";
     }
    $str_pagging .=  "</ul>";
    return $str_pagging;
}

