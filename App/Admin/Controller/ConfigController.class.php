<?php
namespace Admin\Controller;
use Think\Controller;

class ConfigController extends PublicController {

    public function index(){

        // 修改配置
        if( IS_POST ){

            $data=I('post./a');

            // 上传logo
            $fileInfo=uploadFile('logo');
            
            if($fileInfo){
                ($fileInfo['state'] != 0 ) && $this->error($fileInfo['msg']);
                // 删除文件
                removeFile($data['logo']);
                $data['logo']= $fileInfo['msg'][0];
            }
            


            //写配置
            writeConfig($data,CONF_PATH.'website.php');
            die( $this->success('修改成功!',U('index')) );
        }

        $this->display();
    }

   /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=D('Node');
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Node/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }

    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=D('Node');
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Node/index')) && exit();
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
        if( D('Node')->delete($id) ){
            $this->success('删除成功！',U('Node/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

}
