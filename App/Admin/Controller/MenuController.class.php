<?php
namespace Admin\Controller;
use Think\Controller;

class MenuController extends PublicController {

    private $menuModel;
    function __construct(){
        parent::__construct();
        $this->menuModel=D('Menu');
    }

    public function index(){
        $res=$this->menuModel->getList();
        $info=I('get.id')? $this->menuModel->getOne():null;

        // dump( $info );

        $this->assign(array(
            'list'  =>  $res,
            'info'  =>  $info
        ));
        $this->display();
    }

   /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){

            I('post.cid') && die( $this->updates(  ) );

            $model=$this->menuModel;
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Menu/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }

    /**
     * [edit 编辑]
     */
    public function updates(){
        if(IS_POST){
            $model=$this->menuModel;
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Menu/index/id/'.I('post.cid') )) && exit();
                }else{
                    $this->success('修改成功！',U('Menu/index/id/'.I('post.cid') )) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }


    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        if( $this->menuModel->delete($id) ){
            $this->success('删除成功！',U('Menu/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

}
