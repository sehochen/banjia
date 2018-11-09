<?php
namespace Home\Controller;
use Think\Controller;

class PageController extends PublicController {

    private $pageModel;
    function __construct(){
        parent::__construct();
        $this->pageModel=D('Admin/Page');
    }

    public function index(){
        $info=$this->pageModel->getInfo(2);

        $this->assign(array(
            'info'  =>  $info
        ));

        $this->display();
    }
  

    public function intro(){
        $info=$this->pageModel->getInfo(1);

        $this->assign(array(
            'info'  =>  $info
        ));
        $this->display();
    }

}