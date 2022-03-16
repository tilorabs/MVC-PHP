<?php
//Site Configuration
ini_set('session.gc_maxlifetime', 7200);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_set_cookie_params(7200);
session_start();

define("ROOT", "../");
define("CONTROLLER_PATH", ROOT . "mvc_parts/controller/");
define("REPOSITORY_PATH", ROOT . "mvc_parts/repository/");
define("MODEL_PATH", ROOT . "mvc_parts/model/mysqli/");
//define("MODEL_PATH", ROOT . "mvc_parts/model/pdo/");
define("SERVICE_PATH", ROOT . "mvc_parts/service/");
define("ENTITY_PATH", ROOT . "mvc_parts/entity/");
define("VIEW_PATH", ROOT . "mvc_parts/view/");
define('ENVIRONMENT', 'dev');
if (ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}