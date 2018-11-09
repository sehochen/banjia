<?php
namespace Home\Controller;
use Think\Controller;

class InformationController extends PublicController {

    public function index(){
    	$res=D('Admin/New')->pageList();

    	// dump( $res['list'][0] );

        $this->assign(array(
            'list'  =>  $res['list'],
            'page'  =>  $res['page'],
        ));    	
        $this->display();
    }

    public function detail(){
        $case=D('Admin/New')->getOne();
        $prevNext=D('Admin/New')->prevNext();

        // dump( $prevNext );

        $this->assign(array(
            'info'  =>  $case,
            'prev'  =>  $prevNext['prev'],
            'next'  =>  $prevNext['next'],
        )); 
        $this->display();
    }


}
