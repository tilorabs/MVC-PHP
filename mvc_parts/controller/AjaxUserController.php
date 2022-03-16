<?php
namespace MVC;
use Error;
use Exception;
require REPOSITORY_PATH.'UserRepository.php';

/**
 * Class AjaxUserController
 * @package MVC
 */
class AjaxUserController extends Controller
{
    private $user;
    private $genderNames;

    /**
     * AjaxUserController constructor.
     * @param array $request
     */
    public function __construct(array $request) {
        parent::__construct($request);
        $this->repository = new UserRepository();
        $this->genderNames = array('male' => $this->pageData['_mr'], 'female' => $this->pageData['_mrs']);
    }

    public function index() {
        if(empty($this->request['search'])) {
            try {
                $this->user = $this->repository->getUser($this->sortBy, $this->sortOrder);
            } catch (Exception | Error $e) {
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('error' => $e->getMessage())));
            }
        } else {
            $cols = array('ID','firstname','lastname');
            $searchfor = $cols[$this->request['search_task']];
            try {
                $this->user = $this->repository->getUser($this->sortBy, $this->sortOrder, $searchfor, $this->request['search']);
            } catch (Exception | Error $e) {
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('error' => $e->getMessage())));
            }
        }
        $this->validData = is_array($this->user);
        $this->renderView();
    }

    public function renderView() {
        require VIEW_PATH.'ajaxUser/'.$this->request['action'].'.php';
    }
}