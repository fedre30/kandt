<?php

function isActive($slug){
	$page = urldecode($_SERVER['QUERY_STRING']);


    if(substr($page, 2, strlen($slug)) === $slug){
        return 'class="active"';
    }

}