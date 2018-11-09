<?php
namespace Admin\Controller;
use Think\Controller;

class ServerController extends PublicController {

    private $cateModel;
    private $serverModel;
    function __construct(){
        parent::__construct();
        $this->cateModel=D('Servercate');
        $this->serverModel=D('Server');
    }

    public function index(){
        $res=$this->cateModel->getList();

        $info=I('get.id')? $this->serverModel->getOne():null;

        // dump( $info );

        $this->assign(array(
            'list'  =>  $res,
            'info'  =>  $info
        ));
        
        $this->display();
    }


    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=$this->serverModel;
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Server/index/id/'.I('post.id'))) && exit();
                }else{
                    $this->success('修改成功！',U('Server/index/id/'.I('post.id'))) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }


}
