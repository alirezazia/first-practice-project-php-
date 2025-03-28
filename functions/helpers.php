<?php
// config
define('BASE_URL',"http://localhost/php-project");

// function for redirect
function redirect($url){
    header("Location:". trim(BASE_URL,'/ ') . '/' . trim($url,'/ '));
    exit;
}

// function for asset files
function asset($file){
    return trim(BASE_URL, '/ ') . '/' .  trim($file , '/ ');
}

// function for a link
function url($url){
    return trim(BASE_URL, '/ ') . '/' .  trim($url , '/ ');
}

// function for debuge
function dd($var){
    echo "<pre>";
    var_dump($var);
    exit;
}

