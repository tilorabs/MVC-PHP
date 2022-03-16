<?php
namespace MVC;
require MODEL_PATH.'UserModel.php';
require ENTITY_PATH.'User.php';

/**
 * Class UserRepository
 * @package MVC
 */
class UserRepository
{
    /**
     * @var UserModel
     */
    private $usermodel;

    /**
     * UserRepository constructor.
     */
    public function __construct() {
        $this->usermodel = new UserModel();
    }

    /**
     * @param int $orderByCol
     * @param string $sortOrder
     * @param null $searchfor
     * @param null $search
     * @param int $offset
     * @param int $count
     * @return array
     */
    public function getUser($orderByCol=2, $sortOrder='ASC', $searchfor=null, $search=null, $offset=0, $count=2000) {
        $result = null;
        $rows = $this->usermodel->getUser($orderByCol, $sortOrder, $searchfor, $search, $offset, $count);
        foreach ($rows as $row) {
            $result[$row['uniqueid']] = new User($row);
        }
        return $result;
    }
}