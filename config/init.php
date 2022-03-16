<?php
use MVC\ServiceContainer;
//Includes and loading services and sanitize requests
$serviceConfig = require(ROOT.'config/serviceConfig.php');
require SERVICE_PATH.'ServiceContainer.php';
require MODEL_PATH.'Model.php';
require CONTROLLER_PATH.'Controller.php';
ServiceContainer::loadConfig($serviceConfig);

function sanitize ($value) {
    if (is_array($value)) {
        array_walk_recursive($value, 'sanitize_value');
    } else {
        sanitize_value($value);
    }
    return $value;
}

function sanitize_value (&$value) {
    $value = trim(htmlspecialchars($value));
}