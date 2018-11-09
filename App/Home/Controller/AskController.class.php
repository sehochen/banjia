<?php
namespace Home\Controller;
use Think\Controller;

class AskController extends PublicController {

    public function index(){
    	$res=D('Admin/New')->pageAsk();

    	// dump( $res['list'][0] );

        $this->assign(array(
            'list'  =>  $res['list'],
            'page'  =>  $res['page'],
        ));    	
        $this->display();
    }

    public function detail(){
        $case=D('Admin/New')->getOne();
        $prevNext=D('Admin/New')->prevNextAsk();

        // dump( $prevNext );

        $this->assign(array(
            'info'  =>  $case,
            'prev'  =>  $prevNext['prev'],
            'next'  =>  $prevNext['next'],
        )); 
        $this->display();
    }

}