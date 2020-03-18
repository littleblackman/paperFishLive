<?php

/**
 * Create path function to create url
 *
 * @param [string] $name
 * @return void
 */
function path($name, $var = null) {
    $routes = $GLOBALS['routes'];
    if(!isset($routes[$name]['url'])) return $name;
    if($var) $var = '/'.$var; 
    return HOST.$routes[$name]['url'].$var;
}

function is_owner($object) {
    if($object->getOwnerId() != $_SESSION['user_id']) return false;
    return true;
}

function checked($first, $second) {
    if($first != $second) return null;
    return "checked";
}

function selected($first, $second) {
    if($first != $second) return null;
    return "selected";
}