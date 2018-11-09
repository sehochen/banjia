<?php
namespace Admin\Model;
use Think\Model;

class MenuModel extends Model {
    
    //插入的时候允许接受的字段
    protected $insertFields =  'pid,name,sort_id,state,route';
    //更新的时候允许接受的字段
    protected $updateFields =  'cid,pid,name,sort_id,state,route';

    //验证规则
    protected $_validate = array(
        array('name','require','名称不能为空',1),
        // array('username', '1,30', '用户名最长不能超过 30 个字符！', 1, 'length', 3),
    );

    //自动完成
    protected $_auto = array (
        array('add_time','time',1,'function'), // 对add_time字段在新增的时候写入当前时间戳
    );
	
    protected function _before_insert(&$data,$options) {
		// 插入数据前的回调方法
    }
    
    protected function _after_insert($data,$options) {
    	// 插入成功后的回调方法
    }

	
    protected function _before_update(&$data,$options) {
    	// 更新数据前的回调方法
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
        // dump($res);                    
        return $this->get_tree($res,0);
                 
    }

    //获取列表
    public function getListTop(){
        $where=array();
        $where['state'] = 0;
        $where['pid'] = 0;

        // 进行分页数据查询
        return $this->field('*')
                    ->where($where)
                    ->order('sort_id asc')
                    ->select();                                  
    }


    //获取单条
    public function getOne(){
        $where=array();

        I('get.id') && $where['cid']=I('get.id');

        // 进行分页数据查询
       return $this->field('*')
                    ->where($where)
                    ->order('sort_id asc')
                    ->find();                
    }


    //无限级分类
    public function  get_tree($arr,$pid=0,$level=0){
        static $tree=array();

        foreach($arr as $v){

            if( $v['pid']==$pid ){
                $v['level']=$level;

                // dump($v);

                $tree[]=$v;
                $this->get_tree($arr,$v['cid'],$level+1);
            }

        }

        // dump($tree);
        return $tree;
    }




}