<?php
namespace MVC;
use Exception;
use mysqli;
use mysqli_sql_exception;
use PDO;
use PDOException;

/**
 * Class ServiceContainer
 * @package MVC
 */
class ServiceContainer
{
    /**
     * @var mixed $mySqliDbHandle
     */
    private static $mySqliDbHandle = null;

    /**
     * @var mixed $myPdoDbHandle
     */
    private static $myPdoDbHandle = null;

    /**
     * @var array $appconfig
     */
    private static $appconfig = false;

    /**
     * @param $appconfig
     */
    public static function loadConfig($appconfig) {
        self::$appconfig = $appconfig;
    }

    /**
     * @throws Exception
     */
    public static function getMySqliDbHandle() {
        if (self::$mySqliDbHandle === null) {
            try {
                self::$mySqliDbHandle = new mysqli(self::$appconfig['mvc_db_host'], self::$appconfig['mvc_db_user'], self::$appconfig['mvc_db_password'],
                    self::$appconfig['mvc_db_database'], self::$appconfig['mvc_db_port']);
                self::$mySqliDbHandle->set_charset("utf8");
            } catch (mysqli_sql_exception $e) {
                self::closeMySqliDbHandle();
                header("location: error.php?out=".$e->getMessage());
            }
        }
        return self::$mySqliDbHandle;
    }

    /**
     *
     */
    public static function closeMySqliDbHandle() {
        if(isset(self::$mySqliDbHandle)) {
            self::$mySqliDbHandle->close();
            self::$mySqliDbHandle = null;
        }
    }

    /**
     * @throws Exception
     */
    public static function getMyPdoDbHandle() {
        if (self::$myPdoDbHandle === null) {
            try {
                self::$myPdoDbHandle = new PDO("mysql:host=".self::$appconfig['mvc_db_host'].";dbname=".self::$appconfig['mvc_db_database'],
                    self::$appconfig['mvc_db_user'], self::$appconfig['mvc_db_password']);
                self::$myPdoDbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$myPdoDbHandle->exec("set names utf8");
            } catch (PDOException $e) {
                self::closeMyPdoDbHandle();
                header("location: error.php?out=".$e->getMessage());
            }
        }
        return self::$myPdoDbHandle;
    }

    /**
     *
     */
    public static function closeMyPdoDbHandle() {
        if(isset(self::$myPdoDbHandle)) {
            self::$myPdoDbHandle->close();
            self::$myPdoDbHandle = null;
        }
    }

    /**
     * @param $value
     * @return mixed
     */
    public static function getValue($value) {
        return self::$appconfig[$value];
    }
}