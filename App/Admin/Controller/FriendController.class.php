<?php
namespace Admin\Controller;
use Think\Controller;

class FriendController extends PublicController {

    private $friendModel;
    function __construct(){
        parent::__construct();
        $this->friendModel=D('Friend');
    }

    public function index(){
        $res=$this->friendModel->page();
        
        // dump( $res['list'] );

        $this->assign(array(
            'list'  =>  $res['list'],
            'page'  =>  $res['page'],
        ));        
        $this->display();
    }

   /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=$this->friendModel;
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Friend/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $this->display();
        }
    }

    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=$this->friendModel;
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Friend/index')) && exit();
                }else{
                    $this->success('修改成功！',U('Friend/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $info=$this->friendModel->getOne();            

            $this->assign(array(
                'info'  =>  $info,
            ));             
            $this->display();
        }
    }


    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        $model=$this->friendModel;
        if( $model->delete($id) ){
            $this->success('删除成功！',U('Friend/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

}
