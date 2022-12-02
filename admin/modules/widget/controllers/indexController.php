<?php

function construct() {

}

function indexAction(){
    load_view('menu');
}
function add_widgetAction(){
     load_view('add_widget');
}
function list_widgetAction(){
    load_view('list_widget');
}