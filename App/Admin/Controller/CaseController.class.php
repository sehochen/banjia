<?php
namespace Admin\Controller;
use Think\Controller;

class CaseController extends PublicController {

    private $caseModel;
    function __construct(){
        parent::__construct();
        $this->caseModel=D('Case');
    }

    public function index(){
        $res=$this->caseModel->page();

        // var_dump($res);
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

            // dump( $_FILES );
            // die;
            

            $model=$this->caseModel;
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Case/index')) && exit();
                }else{
                    $this->error( $model->getError() );
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
    public function edit(){
        if(IS_POST){

            $model=$this->caseModel;
            $data=I('post.');

            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Case/index' )) && exit();
                }else{
                    $this->success('修改成功！',U('Case/index' )) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $res=$this->caseModel->getOne();

            // var_dump($res);
            $this->assign(array(
                'info'  =>  $res,
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
        $model=$this->caseModel;
        if( $model->delete($id) ){
            $this->success('删除成功！',U('Case/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

}
