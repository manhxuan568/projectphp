<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
   
    load_model('index');
}


function aboutAction() {
    load_view('about');
}
function contactAction() {
    load_view('contact');
}

