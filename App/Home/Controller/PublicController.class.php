<?php
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller {

	function __construct(){
		parent::__construct();
		$slide=D('Admin/Slide')->getList();
		$menu=D('Admin/Menu')->getListTop();
		$server=D('Admin/Servercate')->getListHide();
		$new=D('Admin/Newcate')->getListHide();

		// dump( $server );

    	$this->assign(array(
    		'slideList'		=>	$slide['list'],
    		'menuList'		=>	$menu,
    		'serverList'	=>	$server,
    		'newList'	=>	$new,
    	));		
	}


}