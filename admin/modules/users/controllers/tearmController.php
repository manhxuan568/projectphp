<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('lib', 'sendmail');
  
   
}

function indexAction(){
    
    load_view('team_list');
}