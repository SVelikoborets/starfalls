<?php
namespace Core;
error_reporting(E_ALL);
ini_set('display_errors','on');

spl_autoload_register();

$routes = require $_SERVER['DOCUMENT_ROOT'].'/project/config/routes.php';

$track = ( new Router) ->getTrack($routes, $_SERVER['REQUEST_URI']);

$page = (new Dispatcher) ->getPage($track);

echo (new View)  ->render($page);





