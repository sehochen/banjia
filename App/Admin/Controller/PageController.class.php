<?php
namespace Admin\Controller;
use Think\Controller;

class PageController extends PublicController {

    private $pageModel;
    function __construct(){
        parent::__construct();
        $this->pageModel=D('Page');
    }

    public function index(){
        $info=$this->pageModel->getOne();

        $this->assign(array(
            'info'  =>  $info
        ));
        
        $this->display();
    }


    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=$this->pageModel;
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Page/index/id/'.I('post.id'))) && exit();
                }else{
                    $this->success('修改成功！',U('Page/index/id/'.I('post.id'))) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }


}
