<?php
namespace Admin\Controller;
use Think\Controller;

class SlideController extends PublicController {

	private $slideModel;
	function __construct(){
		parent::__construct();
		$this->slideModel=D('Slide');
	}
	

    public function index(){
   
    	$res=$this->slideModel->getList();
    	$info=I('get.id')? $this->slideModel->getOne():null;

    	$this->assign(array(
    		'list'	=>	$res['list'],
    		'info'	=>	$info
    	));
        $this->display();
    }

    // 添加
    public function add(){
    	if( IS_POST ){
            $model=$this->slideModel;

            I('post.id') && die( $this->updates() );

            $data=I('post.');

            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Slide/index')) && exit();
                }else{
                    $this->error( $model->getError() );
                }
            }else{
                $this->error( $model->getError() );
            }
    	}
    }

    // 更新
    public function updates(){
        if(IS_POST){
            $model=$this->slideModel;
            $data=I('post.');

            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Slide/index/id/'.I('post.id'))) && exit();
                }else{
                	$this->success('修改成功！',U('Slide/index/id/'.I('post.id'))) && exit();
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
        if( $this->slideModel->delete($id) ){
            $this->success('删除成功！',U('Slide/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

}