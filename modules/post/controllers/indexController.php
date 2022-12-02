<?php

function construct() {
    load_model('index');
}

function indexAction(){
   
}
function list_postAction(){
     load_view('list_blog');
}

function detail_blogAction(){
   
    
    load_view('detail_blog');
}