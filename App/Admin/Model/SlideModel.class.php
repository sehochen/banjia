<?php
namespace Admin\Model;
use Think\Model;

class SlideModel extends Model {
    
    //插入的时候允许接受的字段
    protected $insertFields =  'title,img,url,desc,sort_id,add_time';
    //更新的时候允许接受的字段
    protected $updateFields =  'id,title,img,url,desc,sort_id,add_time';

    //验证规则
    protected $_validate = array(
        array('title','require','标题不能为空',1),
        // array('username', '1,30', '用户名最长不能超过 30 个字符！', 1, 'length', 3),
    );

    //自动完成
    protected $_auto = array (
        array('add_time','time',1,'function'), // 对add_time字段在新增的时候写入当前时间戳
    );
	
    protected function _before_insert(&$data,$options) {
		// 插入数据前的回调方法
        $data['add_time']=time(); 
        // 上传logo
        $fileInfo=uploadFile('img');
        
        if($fileInfo){

            if( ($fileInfo['state'] != 0 ) ){
                $this->error=$fileInfo['msg'];
                return false;
            }
            
            // 删除文件
            removeFile($data['img']);
            $data['img']= $fileInfo['msg'][0];
            echo '.Public/'.$data['img'];
            die();
            thumbImg('./Public/'.$data['img'],1920,430);
        }
    }
    
    protected function _after_insert($data,$options) {
    	// 插入成功后的回调方法
    }

	
    protected function _before_update(&$data,$options) {
    	// 更新数据前的回调方法
        // 上传logo
        $fileInfo=uploadFile('img');
        
        if($fileInfo){
            ($fileInfo['state'] != 0 ) && $this->error($fileInfo['msg']);
            // 删除文件
            removeFile($data['img']);
            $data['img']= $fileInfo['msg'][0];

            thumbImg('./Public/'.$data['img'],1920,430);
        }
    }
    
    protected function _after_update($data,$options) {
    	// 更新成功后的回调方法
    }

    
    protected function _before_delete($options) {
		// 删除数据前的回调方法
    }    
    
    protected function _after_delete($data,$options) {
		// 删除成功后的回调方法
    }


    //获取列表
    public function getList(){

        // 进行分页数据查询
        $res = $this->field('*')
                    ->order('sort_id asc')
                    ->select();
        return array(
            'list' => $res,
        );
                 
    }

    //获取单条
    public function getOne(){
        $where=array();

        I('get.id') && $where['id']=I('get.id');

        // 进行分页数据查询
       return $this->field('*')
                    ->where($where)
                    ->order('sort_id asc')
                    ->find();
                 
    }



}