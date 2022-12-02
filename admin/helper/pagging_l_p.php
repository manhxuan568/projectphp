<?php

function pagging_lp($page,$num_page,$base_url=""){
    $str_pagging = "<ul class='list-paging pagging' class='fl-right'>";
    if($page >1){
        $page_prev = $page -1;
        $str_pagging.= "<li><a href=\"{$base_url}&page={$page_prev}\"><</a></li>";
    }
    
    for($i=1;$i <= $num_page; $i++){
        $active = "";
       if($i == $page) $active = "class='active1'"; 
      $str_pagging.= "<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>"; 
    }
    if($page < $num_page){
        $page_next = $page +1;
        $str_pagging.= "<li><a href=\"{$base_url}&page={$page_next}\">></a></li>";
    }
    $str_pagging.= "</ul>";
    return $str_pagging;
}

//<ul id="list-paging" class="fl-right">
//                        <li>
//                            <a href="" title=""></a>
//                        </li>
//                        <li><a href="" title="">1</a></li>
//                           
//                       
//                        <li>
//                            <a href="" title="">2</a>
//                        </li>
//                        <li>
//                            <a href="" title="">3</a>
//                        </li>
//                        <li>
//                            <a href="" title="">></a>
//                        </li>
//                    </ul>