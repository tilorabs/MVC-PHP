<?php
namespace MVC;
use Error;
use Exception;
use function ob_get_clean;
use function ob_start;
require REPOSITORY_PATH.'UserRepository.php';

/**
 * Class UserController
 * @package MVC
 */
class UserController extends Controller
{
    private $user;
    private $genderNames;

    /**
     * UserController constructor.
     * @param array $request
     */
    public function __construct(array $request) {
        parent::__construct($request);
        $this->repository = new UserRepository();
        $this->genderNames = array('male' => $this->pageData['_mr'], 'female' => $this->pageData['_mrs']);
    }

    public function index() {
        try {
            $this->user = $this->repository->getUser($this->sortBy, $this->sortOrder);
            $this->validData = is_array($this->user);
        } catch(Exception | Error $e) {
            $this->error = $this->pageData['_errquery'].': '.$e->getMessage();
        }
        $this->renderView();
    }

    public function renderView() {
        ob_start();
        require VIEW_PATH.'inc/header.php';
        require VIEW_PATH.'inc/error_success.php';
        require VIEW_PATH . 'user/index.php';
        require VIEW_PATH.'inc/footer.php';
        echo ob_get_clean();
    }
}