<?php
namespace Home\Controller;
use Think\Controller;

class CaseController extends PublicController {

    public function index(){

        $case=D('Admin/Case')->page();

        // dump( $case['list'] );

        $this->assign(array(
            'caseList'  =>  $case['list'],
            'page'      =>  $case['page'],
            'count'      =>  $case['count'],
        )); 
        $this->display();
    }


    public function detail(){
        $case=D('Admin/Case')->getOne();
        $prevNext=D('Admin/Case')->prevNext();

        // dump( $prevNext );

        $this->assign(array(
            'info'  =>  $case,
            'prev'  =>  $prevNext['prev'],
            'next'  =>  $prevNext['next'],
        )); 
        $this->display();
    }

}
