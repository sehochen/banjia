<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends PublicController {

    public function index(){
        $res=D('Admin')->page();
        
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
            $model=D('Admin');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Admin/index')) && exit();
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
            $model=D('Admin');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Admin/index')) && exit();
                }else{
                    $this->success('修改成功！',U('Admin/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }else{
            $info=D('Admin')->getOne();            

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
        if( D('Admin')->delete($id) ){
            $this->success('删除成功！',U('Admin/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }


    public function pass(){ 
        $id=session('uid'); 
        $info=D('Admin')->getInfo($id);

        if( IS_POST ){
            $data=I('post.');
            if($info['password']!= md5( $data['mpass'] ) ){
                $this->error('原密码错误！');
                exit;
            }else if( $data['newpass'] != $data['renewpass'] ){
                $this->error('两次密码不一致！');
                exit;
            }
            $data['password']=$data['renewpass'];
            $res=D('Admin')->where( array('id' => $id ) )->save($data);
            if ($res) {
                 $this->success('修改成功！',U('Login/loginout') ) && exit();
            }else{
                $this->error('修改失败！');
            }
            // dump( $data );
        }else{

            $this->assign(array(
                'info'  =>  $info,
            )); 
            // var_dump($info);
            $this->display();            
        }

    }


}
