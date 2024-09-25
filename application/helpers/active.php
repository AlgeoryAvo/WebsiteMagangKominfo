<?php

function activate_menu($menu) {
    $CI =& get_instance();
    $classname = $CI->router->fecth_class();
    return $classname == $menu ? 'active' : '';
}

?>