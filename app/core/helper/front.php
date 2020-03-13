<?php



function path($name) {
    $routes = $GLOBALS['routes'];
    return HOST.$routes[$name]['url'];
}