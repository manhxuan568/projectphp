<?php

function construct() {
    load_model('index');
  
}

function indexAction(){
   
    if(isset($_POST['action'])){
        $search_name = $_POST['search'];
        $result = get_by_search($search_name);
        $output = '';
        foreach ($result as $item){
            $output .= ' 
                  <div class="media">
                      <a href="">
                      <img src="admin/'.$item['upload_file'].'" width="50" height="" alt="alt"/>
                      </a>
                      <div class="media_body" style=" padding-left: 10px ;font-style: italic;">
                      <h3><a href="url">'.$item['p_name'].'</a></h3>
                      </div>    
                  </div>
                 ';
        }
      echo $output;  
    }
    
}

function filterAction(){
    global $error,$search_filter, $key_word, $num_product_keyword, $data;
    if(isset($_POST['btn_filter'])){
     $error = array();
     if(empty($_POST['search-ajax'])){
         $error['search'] = "<img style='display: block;width:500px; height:auto; margin: 10px auto;' src='https://www.dokantec.com/resources/assets/front/images/no-product-found.png' alt=''>";
     } else {
         if(get_by_search($_POST['search-ajax'])){
             $search_filter = get_by_search($_POST['search-ajax']);
             $num_product_keyword = num_product_keyword($_POST['search-ajax']);
             $key_word = $_POST['search-ajax']; 
            
         }else{
           $error['search'] = "<img style='display: block;width:500px; height:auto; margin: 10px auto;' src='https://www.dokantec.com/resources/assets/front/images/no-product-found.png' alt=''>";  
         }
        //// 
     }
     /////
     if(empty($error)){
         $data['search_filter']= $search_filter;
         $data['key_word']= $key_word;
         $data['num_product_keyword']= $num_product_keyword;
     }
 }
  
 load_view("search_filter", $data);
}