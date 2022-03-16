<?php
namespace MVC;

/**
 * Class Model
 * @package MVC
 */
class Model
{
    protected $db;
    /**
     * Model constructor
     */
    public function __construct() {
        $this->db = ServiceContainer::getMyPdoDbHandle();
    }
}