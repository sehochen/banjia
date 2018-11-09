<?php
namespace Home\Controller;
use Think\Controller;

class ConactController extends PublicController {

    public function index(){
        $this->display();
    }

    public function map(){
        // var_dump( $map );
        $this->display();
    }

}
