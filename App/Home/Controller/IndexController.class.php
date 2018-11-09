<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends PublicController {

    public function index(){
        $case=D('Admin/Case')->getList();
		$link=D('Admin/Friend')->getList();
		$zhishi=D('Admin/New')->getListCate(2);
		$gsdt=D('Admin/New')->getListCate(1);
		$ask=D('Admin/New')->getListCate(3);

        $intro=D('Admin/Page')->getInfo(1);

        // dump($intro);
		

    	$this->assign(array(
    		'caseList'		=>	$case['list'],
    		'zhishiList'		=>	$zhishi['list'],
    		'gsdtList'		=>	$gsdt['list'],
            'askList'       =>  $ask['list'],
    		'linkList'		=>	$link['list'],
            'intro'         =>  $intro
    	));	
        $this->display();
    }




}