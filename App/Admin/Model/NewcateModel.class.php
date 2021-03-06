<?php
namespace Admin\Model;
use Think\Model;

class NewcateModel extends Model {

    //插入的时候允许接受的字段
    protected $insertFields =  'cid,name,sort_id,state';
    //更新的时候允许接受的字段
    protected $updateFields =  'cid,name,sort_id,state';

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

        $id=$data['cid'];

        // D('Server')->add(array(
        //     'id'        =>  $id,
        //     'content'   =>  '暂无内容',
        //     'add_time0' =>  time(),
        // ));

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
        // $id=$data['cid'];
        // D('Server')->delete( $id);
    }


    /**[page 实现分页 筛选] 结果包含分页*/
    public function page(){
        $where=array();

        I('get.parent_id') && $where['parent_id']=I('get.parent_id');
        
        $order='id asc';
        I('get.order') && $order==I('get.order');


        // 查询满足要求的总记录数
        $count = $this->where($where)->count();

        $Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)

        //设置
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');    
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');

        $show  = $Page->show();// 分页显示输出

        // 进行分页数据查询
        $res = $this->field('*')
                    ->where($where)
                    ->order($order)
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();
        return array(
            'list' => $res,
            'page' => $show,
        );
                 
    }

    //获取列表
    public function getList(){
        $where=array();
        $where['cid'] = array("neq",3);

        // 进行分页数据查询
        return $this->field('*')
                    ->where($where)
                    ->order('sort_id asc')
                    ->select();
                 
    }

    //获取列表
    public function getListHide(){
        $where=array();
        $where['state'] = 0;
        
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




}