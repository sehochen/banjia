<?php
namespace Home\Controller;
use Think\Controller;

class ServerController extends PublicController {

    public function index(){

		$server=D('Admin/Server')->getOne();

    	$this->assign(array(
    		'info'	=>	$server,
    	));	

        $this->display();
    }

    // public function detail($id){
    //     $this->display();
    // }

}
