<?php
namespace Admin\Controller;
use Think\Controller;

class NewController extends PublicController {

    private $cateModel;
    private $newModel;
    function __construct(){
        parent::__construct();
        $this->cateModel=D('Newcate');
        $this->newModel=D('New');
    }

    public function index(){
        $cate=$this->cateModel->getList();
        
        $res=$this->newModel->page();
        
        // dump( $res['list'] );

        $this->assign(array(
            'cate'  =>  $cate,
            'list'  =>  $res['list'],
            'page'  =>  $res['page'],
        ));

        $this->display();
    }


    public function ask(){
        $cate=$this->cateModel->getList();
        
        $res=$this->newModel->page();
        
        // dump( $res['list'] );

        $this->assign(array(
            'cate'  =>  $cate,
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
            $model=$this->newModel;
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('New/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $cate=$this->cateModel->getList();

            $this->assign(array(
                'cate'  =>  $cate,
            ));            
            $this->display();
        }
    }
    public function askAdd(){
        if(IS_POST){
            $model=$this->newModel;
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('New/ask/pid/3')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $cate=$this->cateModel->getList();

            $this->assign(array(
                'cate'  =>  $cate,
            ));            
            $this->display();
        }
    }



    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=$this->newModel;
            $data=I('post.');

            // dump($data); die;

            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('New/index')) && exit();
                }else{
                    // $this->success('修改成功！',U('New/index')) && exit();
                    $this->error( $model->getError() );
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $cate=$this->cateModel->getList();
            $info=$this->newModel->getOne();

            // dump( $info );

            $this->assign(array(
                'cate'  =>  $cate,
                'info'  =>  $info
            ));            
            $this->display();
        }
    }

    public function askEdit($id){
        if(IS_POST){
            $model=$this->newModel;
            $data=I('post.');


            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('New/ask/pid/3')) && exit();
                }else{
                    // $this->success('修改成功！',U('New/index')) && exit();
                    $this->error( $model->getError() );
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $cate=$this->cateModel->getList();
            $info=$this->newModel->getOne();

            // dump( $info );

            $this->assign(array(
                'cate'  =>  $cate,
                'info'  =>  $info
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
        $model=$this->newModel;
        if( $model->delete($id) ){
            $this->success('删除成功！',U('New/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

    public function askDel($id){  
        $model=$this->newModel;
        if( $model->delete($id) ){
            $this->success('删除成功！',U('New/ask/pid/3')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }


}
