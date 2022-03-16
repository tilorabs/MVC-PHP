<?php
namespace MVC;

/**
 * Class UserModel
 * @package MVC
 */
class UserModel extends Model
{
    /**
     * @param int $orderByCol
     * @param string $sortOrder
     * @param null $searchfor
     * @param null $search
     * @param int $offset
     * @param int $count
     * @return mixed
     */
    public function getUser($orderByCol=2, $sortOrder='ASC', $searchfor=null, $search=null, $offset=0, $count=2000) {
        $cols = array('ID','firstname','lastname','gender','email');
        $query = "SELECT ID as uniqueid, firstname, lastname, email, gender FROM users";
        $query .= $searchfor == null?"":" WHERE ".$searchfor." LIKE '".$search."%'";
        $query .= " ORDER BY ".$cols[$orderByCol]." ".$sortOrder;
        $query .= " LIMIT ".$offset.", ".$count;
        $dbresult = $this->db->query($query);
        return $dbresult->fetch_all(MYSQLI_ASSOC);
    }
}