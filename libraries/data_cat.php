<?php
//hàm đệ quy đa cấp nhưng đổ ra dạng bảng
function data_tree($data, $parent_id = 0, $level= 0){
    $result = [];
    foreach ($data as $item){
        
        if($item['parent_id'] == $parent_id){
        $item['level'] = $level;
        $result[] = $item;
        unset($data[$item['id']]);
        $child = data_tree($data, $item['id'], $level + 1);
        $result = array_merge($result, $child);
        }
    }
   return $result; 
}

//Hai hàm dưới là hàm đệ quy Menu đa cấp hay nhiều cấp
function has_child($data, $id){
    foreach ($data as $v) {
        if($v['parent_id'] == $id) return true;
    }
    return false;
}

function render_menu($data, $menu_class = "", $parent_id= 0, $level = 0){
    if($level == 0)
        $result = "<ul class='{$menu_class}'>";
    else
        $result = "<ul class='sub-menu'>";
    foreach ($data as $v) {
        if($v['parent_id'] == $parent_id){
            $result .= "<li>";
            $result .= "<a href='Danh-muc/{$v['slug']}-{$v['id']}.html' title=''>{$v['cat_name']}</a>";
            if(has_child($data, $v['id'])){
            $result .= render_menu($data,$menu_class = "", $v['id'], $level + 1);
            $result .= "</li>";
            }
        }
    }
    $result .= "</ul>";
    return $result;
}