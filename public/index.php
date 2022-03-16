<?php
require('../config/settings.php');
require(ROOT.'config/init.php');
$request = array_merge($_GET, $_POST);
$request = sanitize($request);
if(!isset($request['controller'])) {
    $request['controller'] = 'user';
}
if(!isset($request['action'])) {
    $request['action'] = 'index';
}
$controller = ucfirst($request['controller']);
if (is_file(CONTROLLER_PATH . $controller . 'Controller.php')) {
    require CONTROLLER_PATH . $controller . 'Controller.php';
    $controllerClassName = 'MVC\\'.$controller.'Controller';
    if (class_exists($controllerClassName)) {
        $controller = new $controllerClassName($request);
        $actionMethod = $request['action'];
        if (method_exists($controller, $actionMethod)) {
            $controller->$actionMethod();
        } else {
            header("location: error.php?out=Method not found");
        }
    } else {
        header("location: error.php?out=Class not found");
    }
} else {
    header("location: error.php?out=File not found");
}