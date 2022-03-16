<?php
namespace MVC;

/**
 * Class Controller
 * @package MVC
 */
class Controller
{
    protected $request;
    protected $repository;
    protected $pageData = array();
    protected $validData = false;
    protected $error;
    protected $success;
    protected $sortBy;
    protected $sortOrder;

    /**
     * Controller constructor.
     */
    public function __construct(array $request) {
        $this->request = $request;
        if(!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'de';
        }
        if(isset($this->request['lang'])) {
            $_SESSION['lang'] = $this->request['lang'];
        }
        $this->pageData['lang'] = $_SESSION['lang'];
        $this->pageData['controllerlink'] = $this->makeUrl($this->request['controller']);
        $this->pageData['completelink'] = $this->makeUrl($this->request['controller'], $this->request['action'], true);
        $langview = require(VIEW_PATH.'lang/'.$this->pageData['lang'].'/'.$this->request['controller'].'.php');
        $langcommon = require(VIEW_PATH.'lang/'.$this->pageData['lang'].'/common.php');
        $this->pageData = array_merge($this->pageData, $langview, $langcommon);
        $this->sortBy = isset($this->request['sortBy'])?$this->request['sortBy']:2;
        $this->sortOrder = isset($this->request['sortOrder'])?$this->request['sortOrder']:'ASC';
    }

    protected function makeUrl($controller, $action = false, $allparams = false) {
        $new_request = $this->request;
        $link = 'index.php?controller='.$controller;
        if($action)
            $link .= '&action='.$action;
        if($allparams) {
            unset($new_request['controller']);
            unset($new_request['action']);
            if(count($new_request))
                $link .= '&'.http_build_query($new_request);
        }
        return $link;
    }
}