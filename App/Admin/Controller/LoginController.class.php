<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    
        //验证码
    public function code(){
        $config =array(
            'fontSize'    =>    32,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'useImgBg'    =>     false,  // 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/Verify/bgs 目录下面的图片
            'codeSet'     => '0123456789',  // 设置验证码字符为纯数字
            'useCurve'    =>    false   //是否使用混淆曲线
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();  
    }
    

    //注销登陆
    public function loginout(){
        session('uid',null);
        $this->error('正在退出...',U('Login/index') );        
    }
    
    //登陆
    public function login(){

        $model=D('Admin');
	   	// 接收表单并且验证表单
	   	if($model->validate($model->_login_validate)->create()){
	   		if($model->login()){
	                    $this->success('登录成功!', U('Index/index'));
	                    exit;
	                }else{
	                    $this->error($model->getError());   
	                }
	        }else{
	           $this->error($model->getError());   
	        }
	        
	    }   

        
}