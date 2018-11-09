<?php if (!defined('THINK_PATH')) exit(); $website=C('website'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?= $website['charset']; ?>">
<title> <?= $website['title']; ?> </title>
<meta name="description" content="<?= $website['description']; ?>" />
<meta name="keywords" content="<?= $website['keywords']; ?>" />
<link href="/banjia/Public/Home/css/css.1.1.css" rel="stylesheet" type="text/css">
<link href="/banjia/Public/Home/css/css.1.2.css" rel="stylesheet" type="text/css">
<script language="javascript" src="/banjia/Public/Home/js/jquery1.42.min.js"></script>
<script language="javascript" src="/banjia/Public/Home/js/slide.js"></script>

<!--[if lte IE 6]>
<script src="/banjia/Public/Home/js/png.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a');
    </script>
<![endif]-->

</head>
<body>
<script language="javascript" src="/banjia/Public/Home/js/ismobile.js"></script>
<div class="header">
  <div class="head">
    <div class="top rte">
      <div class="logo ale">
        <a title="<?= $website['title']; ?>" href="">
          <img src="/banjia/Public/<?= $website['logo']; ?>" alt="<?= $website['title']; ?>" width="130" height="60">
        </a>
      </div>
      <div class="logo_title"><h2><?= $website['title']; ?></h2>
      <p><?= $website['keywords']; ?></p>
      </div>
      <div class="tel ale">咨询服务热线<br><span class="red"><?= $website['tel']; ?></span></div>
    </div>
  </div>
</div>

<!-- nav -->
<div class="navBar">
  <ul class="nav clearfix">

  <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="n" >
      <a href="/banjia/index.php/<?php echo ($vo["route"]); ?>"><?php echo ($vo["name"]); ?></a>

      <?php if(($vo['cid'] == 3) OR ($vo['name'] == '服务项目' ) ): ?><ul class="sub">   
          <?php if(is_array($serverList)): $i = 0; $__LIST__ = $serverList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vserver): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Server/index/id/'.$vserver['cid']);?>"> <?php echo ($vserver["name"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>          
        </ul>
      <?php elseif(($vo['cid'] == 5) OR ($vo['name'] == '咨询中心' ) ): ?>
        <ul class="sub">   
          <?php if(is_array($newList)): $i = 0; $__LIST__ = $newList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vserver): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Information/index/pid/'.$vserver['cid']);?>"> <?php echo ($vserver["name"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>          
        </ul>
      <?php else: endif; ?>

    </li><?php endforeach; endif; else: echo "" ;endif; ?>  
<!-- nav -->



  </ul>
</div>
<script type="text/javascript">
		jQuery(".nav").slide({ 
				type:"menu", //效果类型
				titCell:".n", // 鼠标触发对象
				targetCell:".sub", // 效果对象，必须被titCell包含
				effect:"slideDown",//下拉效果
				delayTime:300, // 效果时间
				triggerTime:0, //鼠标延迟触发时间
				returnDefault:true  //返回默认状态
			});
	</script> 
<!-- nav -->




	 

<!-- slide -->
<div class="fullSlide">
  <div class="bd">
    <ul style="position: relative; width: 683px; ">

    <?php if(is_array($slideList)): $i = 0; $__LIST__ = $slideList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="background-image: url(/banjia/Public/<?php echo ($vo["img"]); ?>); background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; position: absolute; width: 683px; left: 0px; top: 0px; display: none; background-position: 50% 50%; background-repeat: no-repeat no-repeat; ">
         <a href="/banjia/Public/<?php echo ($vo["img"]); ?>" title="<?php echo ($vo["title"]); ?>"></a> 
      </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
  </div>
  <div class="hd">
    <ul>
      <li class="on">1</li>
      <li>2</li>
      <li>3</li>
    </ul>
  </div>
</div>
<script type="text/javascript">
    jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul",  effect:"fold",  autoPlay:true, autoPage:true, trigger:"click",interTime:5000 });
</script>



<!-- 
<div class="w">
  <div class="w tit_h tit_a">
    <h2>服务品牌</h2>
    <p>Brand</p>
  </div>
</div>
<div class="case_i">
  <div class="prtlist_i prt_i">
    <div class="hd"> <a title="上一个" class="prev"></a> <a class="next" title="下一个"></a></div> 
    <div class="bd">
      <div class="tempWrap">
        <div class="tempWrap" style="overflow:hidden; position:relative; width:1050px">
          <ul style="width: 1050px; position: relative; overflow-x: hidden; overflow-y: hidden; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; left: 0px; ">
            <li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="TCL" href="/banjia/Public/Home//logo/2017/0220/84.html"><img title="TCL" alt="TCL" src="/banjia/Public/Home/picture/1-1f220110629348-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="奥克斯" href="/banjia/Public/Home//logo/2017/0220/83.html"><img title="奥克斯" alt="奥克斯" src="/banjia/Public/Home/picture/1-1f22011020nd-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="科龙" href="/banjia/Public/Home//logo/2017/0220/82.html"><img title="科龙" alt="科龙" src="/banjia/Public/Home/picture/1-1f220110034g7-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="三菱重工" href="/banjia/Public/Home//logo/2017/0220/81.html"><img title="三菱重工" alt="三菱重工" src="/banjia/Public/Home/picture/1-1f2201059192v-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="大金" href="/banjia/Public/Home//logo/2017/0220/80.html"><img title="大金" alt="大金" src="/banjia/Public/Home/picture/1-1f220105k24r-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="海信" href="/banjia/Public/Home//logo/2017/0220/79.html"><img title="海信" alt="海信" src="/banjia/Public/Home/picture/1-1f220105425x0-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="海尔" href="/banjia/Public/Home//logo/2017/0220/78.html"><img title="海尔" alt="海尔" src="/banjia/Public/Home/picture/1-1f220105146207-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="美的" href="/banjia/Public/Home//logo/2017/0220/77.html"><img title="美的" alt="美的" src="/banjia/Public/Home/picture/1-1f22010512t96-lp.jpg"></a></div>
              </div>
            </li>
<li style="float: left; width: 180px; ">
              <div class="casepic logopic">
                <div class="middle-in"><a title="格力" href="/banjia/Public/Home//logo/2017/0220/76.html"><img title="格力" alt="格力" src="/banjia/Public/Home/picture/1-1f22010491lo-lp.jpg"></a></div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    jQuery(".prtlist_i").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:5,delayTime:500,interTime:3000,trigger:"click"});
    </script>
</div> -->


<div class="w tit_h">
  <h2>服务项目</h2>
  <p>Service Items</p>
</div>
<div class="w yewu">
<!-- 
  <div class="ywmk l yw1">
   <div class="ywmk_c">
      <div class="middle-in"> <a href="/banjia/Public/Home//wdxby/dh/" title=""><img src="/banjia/Public/Home/picture/i1.jpg" alt=""></a></div>
    </div> 
    <div class="ywmk_txt"><a href="/banjia/Public/Home//wdxby/dh/" title="广州空调维修">广州空调维修</a></div>
  </div> -->


<!-- server -->
<?php if(is_array($serverList)): $k = 0; $__LIST__ = $serverList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="ywmk l yw<?php echo ($k); ?>">
    <div class="ywmk_txt"><a href="/banjia/index.php/Server/index/id/<?php echo ($vo["cid"]); ?>" title="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></div>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- server -->

</div>




<div class="h20"></div>
<div class="w">
  <div class="w tit_h">
    <h2>服务案例</h2>
    <p style="margin-bottom:10px;">Case</p>
    <p>客户对我们的肯定是我们前进的动力及方向，以客为本竭尽全力满足客户多样化的需求，我们在不断努力...</p>
  </div>
</div>
<div class="case_i">
  <div class="prtlist_i">
    <div class="hd"> <a title="上一个" class="prev"></a> <a class="next" title="下一个"></a></div>
    <div class="bd">
      <div class="tempWrap">
        <div class="tempWrap" style="overflow:hidden; position:relative; width:1050px">
          <ul style="width: 1050px; position: relative; overflow-x: hidden; overflow-y: hidden; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; left: 0px; ">

<!-- case -->
<?php if(is_array($caseList)): $i = 0; $__LIST__ = $caseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="float: left; width: 180px; ">
              <div class="casepic">
                <div class="middle-in">
                  <a title="<?php echo ($vo["title"]); ?>" href="<?php echo U('Case/detail/id/'.$vo['id']);?>">
                    <img title="<?php echo ($vo["title"]); ?>" alt="<?php echo ($vo["title"]); ?>" src="/banjia/Public/<?php echo ($vo["img"]); ?>">
                  </a>
                </div>
              </div>
              <div class="casetxt">
                <a title="<?php echo ($vo["title"]); ?>" href="<?php echo U('Case/detail/id/'.$vo['id']);?>" style="color:#"><?php echo ($vo["title"]); ?></a>
              </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- case -->

          </ul>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    jQuery(".prtlist_i").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:5,delayTime:500,interTime:3000,trigger:"click"});
    </script>
</div>


<div class="h20"></div>
<div class="h20"></div>

<div class="about mt20">
  <div class="w">
    <div class="aimg l">
      <p><img src="/banjia/Public/Home/picture/about.jpg" alt="广州空调维修公司简介"></p>
    </div>
    <div class="about_i r rte">
      <div class="titile_i">
        <h2>公司介绍<span>About us</span></h2>
      </div>
      <p style="text-indent: 2em;">  <?php echo mb_substr($intro['content'], 0,310,'utf-8');?>...  </p>
      <a class="atxt ale" href="<?php echo U('Page/intro');?>">MORE</a></div>
  </div>
</div>



<div class="w tit_h" style="padding-bottom:5px;">
  <h2>资讯中心</h2>
  <p>News</p>
</div>
<div class="w">

  <div class="news l" style="margin-left:0;">
    <div class="news_tit">
      <a title="维修知识" href="<?php echo U('Information/index/pid/2');?>" class="more">>> MORE</a>
      <h2>维修知识</h2>
    </div>
    <ul class="mt15">

<!-- zhishiList -->
<?php if(is_array($zhishiList)): $i = 0; $__LIST__ = $zhishiList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        <a href="/banjia/Public/Home//jszx/wxzs/175.html" title=""><?php echo ($vo["title"]); ?>..</a>
        <span><?php echo date('m月d日',$vo['add_time']);?></span>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- zhishiList -->

    </ul>
  </div>




  <div class="news l">
    <div class="news_tit">
      <a title="公司动态" href="<?php echo U('Information/index/pid/1');?>" class="more">>> MORE</a>
      <h2>公司动态</h2>
    </div>
    <ul class="mt15">

<!-- gsdtList     -->
<?php if(is_array($gsdtList)): $i = 0; $__LIST__ = $gsdtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        <a href="/banjia/Public/" title=""><?php echo ($vo["title"]); ?>..</a>
        <span><?php echo date('m月d日',$vo['add_time']);?></span>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- gsdtList     -->

    </ul>
  </div>




  <div class="fqa l">
    <div class="news_tit">
      <a title="常见问题" href="<?php echo U('Information/index/pid/3');?>" class="more">>> MORE</a>
      <h2>常见问题</h2>
    </div>
    <div class="txtMarquee-top">
      <div class="bd mt20">
        <div class="tempWrap" style="overflow:hidden; position:relative; height:200px">
          <ul class="infoList" style="height: 1368px; position: relative; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: -168px; ">

<!-- askList     -->
<?php if(is_array($askList)): $i = 0; $__LIST__ = $askList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="height: 114px; ">
              <a title="<?php echo ($vo["title"]); ?>？" href="<?php echo U('Ask/detail/id/'.$vo['id']);?>"><?php echo ($vo["title"]); ?>？</a>
              <p><?php echo mb_substr($vo['content'], 0,50,'utf-8');?></p>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- askList     -->



          </ul>
        </div>
      </div>
    </div>
    <script type="text/javascript">
			jQuery(".txtMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50});
		</script> 
  </div>
</div>

<div class="h0"></div>
<div class="links"> 友情链接：

<?php if(is_array($linkList)): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href='http://<?php echo ($vo["link"]); ?>' target='_blank'><?php echo ($vo["name"]); ?></a>   |<?php endforeach; endif; else: echo "" ;endif; ?>

 </div>









<div class="h20"></div>
<div class="h20"></div>

<div class="footer">
  <div class="footnav">
    <div class="w ">
    <ul class="nac">



<!-- nav  -->
<?php if(is_array($menuList)): $k = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k < 8): ?><li><a href="/banjia/index.php/<?php echo ($vo["route"]); ?>"><?php echo ($vo["name"]); ?></a></li>
        <li>|</li>
      <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
<!-- nav  -->



    </ul>
    </div>
  </div>
  <div class="foot">
    <div class="copyright"> 
      联系人：<?= $website['contact'] ;?>　
      电话：<?= $website['tel'] ;?>　
      Q Q：<?= $website['qq'] ;?>　
      地址：<?= $website['address'] ;?> <br>
      <?= $website['copy'] ;?>
      
<!--       <a href="http://www.gzsnktwx.com/sitemap.html" target="_blank">网站地图</a>|
      <a href="http://www.gzsnktwx.com/sitemap.xml" target="_blank">XML</a><br> -->

    <br>
      本站关键词：<?= $website['keywords'] ;?>

  <!--       <br>
        网站备案号：<a href="/banjia/Public/Home/http://www.miibeian.gov.cn/"></a> -->
    </div>
  </div>
</div>
<script src="/banjia/Public/Home/js/piaofu.js" language="JavaScript"></script>

</body>
</html>