<?php
/* 
 * untuk template website terdiri dari 
 * 1. header
 * 2. content
 * 3. footer
 */
if (!function_exists('element') ){
    function show($view, $data=  array(),$level ='',$template='default'){
        $ci = &get_instance();
        $data['view'] = $view;
        $data = $ci->load->view("templates_$level/$template", $data);        
    }
}

