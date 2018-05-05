<?php
function isActive($url){
    if($_SERVER["PHP_SELF"] == $url){
        echo 'class="active"';
    }
}