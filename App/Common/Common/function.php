<?php

//写出配置
function writeConfig($data,$path){
	return file_put_contents($path, '<?php return '.var_export($data,true).';');
}

//上传
function uploadFile($fileName){
	static $filePath=array();

	if( $_FILES[$fileName]['error'] !=0 ){
		return false;
	}

	$config=C('upload');
	$upload = new \Think\Upload($config);// 实例化上传类	

	// 上传文件 
	$info   =   $upload->upload();
	if(!$info) {

		// 上传错误提示错误信息    
		return array(
			'state'	=>	100,
			'msg'	=>	$upload->getError(),
		);	
		exit;	
	}else{

		// 上传成功 获取上传文件信息    
		foreach($info as $file){
		        $filePath[] = $file['savepath'].$file['savename'];    
		}
	}

	return array(
		'state'	=>	0,
		'msg'	=>	$filePath,
	);
	exit;
}

// 删除
function removeFile($path){
	$upload=C('upload');

	// die( dump($upload['rootPath'].$path) );
	
	if( !file_exists($upload['rootPath'].$path) ){
		return true;		
	}else{
		if(unlink($upload['rootPath'].$path) ){
			return true;
		}
	}
}


//移除xss
function removeXSS($data){

    $path='./Public/htmlpurifier/HTMLPurifier.auto.php';

    //判断是否 是有效文件
    is_file($path) || die('HTMLPurifier url is not valid！');

    //引入
    require_once $path;

    $_clean_xss_config = HTMLPurifier_Config::createDefault();
    $_clean_xss_config->set('Core.Encoding', 'UTF-8');
    //设置保留标签
    $_clean_xss_config->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
    $_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    $_clean_xss_config->set('HTML.TargetBlank', TRUE);
    $_clean_xss_obj = new HTMLPurifier($_clean_xss_config);

    //执行过滤
    return $_clean_xss_obj->purify($data);
}

// 略缩图
function thumbImg($path,$width,$height){
	$image = new \Think\Image(); 
	$image->open( $path );// 按照原图的比例生成一个缩略图并保存
	$image->thumb($width,$height,\Think\Image::IMAGE_THUMB_FIXED)->save($path);	
}
