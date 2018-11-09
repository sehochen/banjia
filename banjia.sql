/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : banjia

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-23 11:59:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bj_admin`
-- ----------------------------
DROP TABLE IF EXISTS `bj_admin`;
CREATE TABLE `bj_admin` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_admin
-- ----------------------------
INSERT INTO `bj_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1492865634');
INSERT INTO `bj_admin` VALUES ('2', 'bool', '431701c4d3526bde27a60efffddc07c6', '1492865810');

-- ----------------------------
-- Table structure for `bj_case`
-- ----------------------------
DROP TABLE IF EXISTS `bj_case`;
CREATE TABLE `bj_case` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `sort_id` tinyint(4) NOT NULL,
  `content` mediumtext,
  `add_time` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_case
-- ----------------------------
INSERT INTO `bj_case` VALUES ('1', '案例1', '1', '<p>案例1</p>', '1492826730', 'Uploads/20170422/58fb11355d65b.PNG');
INSERT INTO `bj_case` VALUES ('2', '案例2', '1', '', '1492828779', 'Uploads/20170422/58fb1144a616f.PNG');
INSERT INTO `bj_case` VALUES ('3', '案例3', '1', '', '1492828812', 'Uploads/20170422/58fb1165a402b.jpg');
INSERT INTO `bj_case` VALUES ('4', '案例4', '1', '', '1492828840', 'Uploads/20170422/58fb11720ef96.PNG');
INSERT INTO `bj_case` VALUES ('5', '案例5', '1', '', '1492828855', 'Uploads/20170422/58fb118051780.PNG');
INSERT INTO `bj_case` VALUES ('6', '案例6', '1', '', '1492828880', 'Uploads/20170422/58fb1188b80b8.PNG');

-- ----------------------------
-- Table structure for `bj_friend`
-- ----------------------------
DROP TABLE IF EXISTS `bj_friend`;
CREATE TABLE `bj_friend` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort_id` smallint(6) NOT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_friend
-- ----------------------------
INSERT INTO `bj_friend` VALUES ('1', '百度', 'baidu', '0', '1475623668');
INSERT INTO `bj_friend` VALUES ('2', '新浪', 'www.sina.com', '1', '1492864567');

-- ----------------------------
-- Table structure for `bj_menu`
-- ----------------------------
DROP TABLE IF EXISTS `bj_menu`;
CREATE TABLE `bj_menu` (
  `cid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `sort_id` tinyint(4) unsigned NOT NULL,
  `state` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `route` varchar(100) DEFAULT NULL,
  `system` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_menu
-- ----------------------------
INSERT INTO `bj_menu` VALUES ('1', '0', '首页', '1', '0', 'Index/index', '1');
INSERT INTO `bj_menu` VALUES ('2', '0', '公司简介', '1', '0', 'Page/intro', '1');
INSERT INTO `bj_menu` VALUES ('3', '0', '服务项目', '2', '0', 'Server/index', '1');
INSERT INTO `bj_menu` VALUES ('4', '0', '服务案例', '3', '0', 'Case/index', '1');
INSERT INTO `bj_menu` VALUES ('5', '0', '资讯中心', '4', '0', 'Information/index', '1');
INSERT INTO `bj_menu` VALUES ('6', '0', '常见问题', '5', '0', 'Ask/index', '1');
INSERT INTO `bj_menu` VALUES ('7', '0', '服务流程', '6', '0', 'Page/index', '1');
INSERT INTO `bj_menu` VALUES ('8', '0', '联系我们', '7', '0', 'Conact/index', '1');

-- ----------------------------
-- Table structure for `bj_new`
-- ----------------------------
DROP TABLE IF EXISTS `bj_new`;
CREATE TABLE `bj_new` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `authour` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `add_time` int(11) NOT NULL,
  `pid` mediumint(9) unsigned NOT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_new
-- ----------------------------
INSERT INTO `bj_new` VALUES ('2', '空调漏电原因分析', '佚名', '<p>空调漏电存在很大的安全隐患，如发现您的空调漏电，请及时与我们联系，以保证您的空调可以安全使用。怎么知道空调是不是漏电</p><p><br/></p>', '1492778842', '3', '1');
INSERT INTO `bj_new` VALUES ('3', '公司动态测试', '佚名', '<p>公司动态测试</p>', '1492829742', '1', '0');
INSERT INTO `bj_new` VALUES ('4', '为何冬季空调制热不足？', '佚名', '<p>在寒冷冬季，特别是南方，很多朋友都喜欢用空调制热，抵抗冬季带来的寒冷据了解，在常年使用以后，很多朋友家里的空调都出现了制热不足的现象，有的误以为家里的空调需要加氟，有的则以为家里的空调出现故障。究竟为何空调长期使用以后制热不足？</p><p>一、使用不当</p><p>空调在长期时候后没有及时的清洗滤网以及内部造成空气流通堵塞，一定程度上会影响空调的制热效果。</p><p>蒸发器、冷凝器尘垢太厚，也会降低换热效果，导致制热能力下降，耗电量增加；制热温度设定过低。</p><p>而空调房间门缝、墙洞未堵死，或是开窗开门频繁，造成室内热量流失等都会是无意间造成空调制暖不强劲的原因。</p><p>二、环境因素</p><p>冷暖型空调分热泵型、热泵辅助电热型和电热型三种产品，在制热量相等条件下，前两种耗电比第三种约小一半，考虑到供电容量和用电费用，现在的家庭普遍选择前两类空调（但应注意它们的使用条件，前两种只适用于——5度以上的环境下，显然对北方地区不适用）。</p><p>热泵型空调器，制热时环境温度过低，空调能效比也降低，在较冷的冬天制热效果不理想，这是正常现象。对于无自动除霜的热泵型空调器，它使用的最低环境温度是零上５度，低于这个温度就不制热或效果很差，这是因为外部换热器上积霜堵住了空气流动，不能再从外界吸入热量的缘故；对于有自动除霜的热泵型空调器，它使用的最低环境温度也是-５度，低于这个温度也不能有效制热。</p><p>三、制冷循环系统、控制系统故障</p><p>1.制冷剂不足。</p><p>冷剂泄露或是不足原因导致，这时可简单的进行自测来辨别是否漏氟。</p><p>2.四通阀串气。</p><p>热泵型空调通过四通阀来切换制冷和制热状态。若四通阀串气，则有部分本应参与热交换的制冷剂在四通阀处直接由压缩机出气管返回到回气管，导致参与热交换的制冷剂减少，热交换效率下降，从而引起制热量不足。</p><p>3.单向阀（又称止逆阀）漏气。</p><p>当单向阀漏气时，制冷系统的高、低压压差下降，室外热交换器的温度上升，从外界获取的热量减少，导致制热量不足。当出现空调制冷正常、制热量不足故障时，通过检测系统运行时的压力，会发现低压侧压力上升，高、低压压差下降。</p><p>4.化霜控制器失灵。</p><p>热泵型空调在制热状态时的蒸发器位于室外机组内，对于采用热冲霜化霜装置的热泵型空调，若化霜控制器失灵，使空调无法及时转入化霜运行状态，则会出现热泵制热时蒸发器结霜现象，影响空调制热的热交换效率，导致制热量不足、甚至停机。</p><p>此时应着重观察是否存在以下现象：化霜感温器件错位、触头粘边或接触不良，风机叶轮打滑或风道阻塞，电磁阀或启动继电器失效。</p><p>5.辅助电加热功能失效。</p><p>现在热泵辅助电热型空调普遍采用PTC电辅助加热技术，PTC电辅助加热技术可在超低温条件下迅速制热，效力强劲，安全可靠，可长期使用。若电辅助加热控制电路或电辅助加热设备出现故障、不能正常工作，在环境温度比较低时，会导致空调制热量不足，甚至在环境恶劣时空调完全不制热。</p><p>对于热泵辅助电热型空调，若出现环境温度较高（在5度以上）制热正常，而环境温度较低（在0度以下）制热量不足或不制热，则应怀疑电辅助加热控制电路或电辅助加热设备出现故障，维修时应着重检查这两个部分。<br /><br /><br />苏宁空调维修售后服务网http://www.gzsnktwx.com/广州空调维修,广州空调清洗,广州空调加雪种</p><p><br /></p>', '1492829796', '3', '0');
INSERT INTO `bj_new` VALUES ('5', '维修知识', '佚名', '<p>维修知识</p>', '1492830034', '2', '0');
INSERT INTO `bj_new` VALUES ('6', '常见问题', '佚名', '<p>常见问题</p>', '1492830422', '0', '0');
INSERT INTO `bj_new` VALUES ('7', '常见问题', '佚名', '<p>常见问题常见问题常见问题常见问题</p>', '1492831954', '3', '0');
INSERT INTO `bj_new` VALUES ('8', '问题', '111', '<p>问题1</p>', '1492851126', '3', '1');

-- ----------------------------
-- Table structure for `bj_newcate`
-- ----------------------------
DROP TABLE IF EXISTS `bj_newcate`;
CREATE TABLE `bj_newcate` (
  `cid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) NOT NULL,
  `sort_id` tinyint(4) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_newcate
-- ----------------------------
INSERT INTO `bj_newcate` VALUES ('1', '0', '1', '0', '公司动态');
INSERT INTO `bj_newcate` VALUES ('2', '0', '2', '0', '维修知识');
INSERT INTO `bj_newcate` VALUES ('3', '0', '3', '1', '常见问题');

-- ----------------------------
-- Table structure for `bj_page`
-- ----------------------------
DROP TABLE IF EXISTS `bj_page`;
CREATE TABLE `bj_page` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `content` mediumtext,
  `add_time` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_page
-- ----------------------------
INSERT INTO `bj_page` VALUES ('1', '<p>&nbsp; &nbsp; &nbsp; &nbsp; 广州苏宁专业空调维修（广州总部），空调维修,广州空调拆装//加雪种//清洗保养 ,苏宁空调维修服务部是一家专业维修、安装服务中心，本公司一直提倡优质化、人性化的服务，以诚信为本，以服务质量为核心，以信誉求生存，以创新求发展，一直承诺价格实惠，诚信服务，为每位客户创造更舒适的生活空间。本公司以“专业安装”、“专业维护”为主。确保每项工程、每个用户都买得放心，用得安心。&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 广州苏宁专业空调维修在广州各区都设有分部，如天河，黄埔，海珠，越秀，荔湾，白云等。只要你一个电话，我总部就近安排，速度快，效率高，保证服务省心，安心，放心。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 空调坏了怎么办？如果空调出现故障，请先不要自行拆卸，以免造成更严重的问题。应找专业空调维修公司来解决，上门服务，维修完毕后用户可当时验收。空调在经过多年运转之后，尤其空调室外机一直安置在风吹雨淋的地方，更容易出现故障，而常见的空调故障包括：不制冷、制冷不良、不制热、制热不良、不通电(开机没反应)、压缩机有噪音、空调遥控没反应、漏水等现象。如果空调出现以上故障，则需要找专业的空调维修公司上门维修。不制冷或不制热：如果压缩机能正常启动，但不制冷或不制热，有可能缺氟或过滤网堵塞；如果压缩机没有正常启动，有可能是启动电容，或制冷系统堵塞，或压缩机过载保护，或压缩机本身有故障。当然，实际维修情况还需现场分析。</p><p><br/></p>', '0', '公司简介');
INSERT INTO `bj_page` VALUES ('2', '<p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　第一步：拨打服务电话</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　我们的服务网络全面覆盖广州，各区都设有分点，市区提供上门服务。当您的电器出现了故障，请拨打广州地区24小时统一客服热线：（13925097116）描述电器所出现的故障，以及留下您的联系方式和地址。</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　第二步：预约服务时间</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　您需要根据您的时间安排和我们的调度安排而商量出一个适当的上门服务时间。我们会按照你预先约定的上门时间，准时到达指定地点。</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　第三步：开机检查,预报费用</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　上门后，维修技师先检查出电器的大体故障原因，并汇报出维修此故障所需的全部费用。同时，您也可以因为价格超出预算而放弃维修。如果放弃维修，我们是不收取费用的(事先有约定的情况下除外)。</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　第四步：认真排除故障</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　如果您认同服务所需全部费用，我们的技师马上为您维修机器，直到故障彻底排除。故障排除之后，您可以开机验收确认故障已经修复。</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　第五步：填写正规保修单</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　为了解决您的后顾之忧，我们会对所提供的维修服务留下凭证，上面注明了故障的原因、维修结果、维修所有费用、保修时间，及我公司的服务电话。</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　第六步：建立回访制度</p><p style=\"padding: 0px; margin-top: 1em; margin-bottom: 1em; list-style: none; color: rgb(51, 51, 51); white-space: normal; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px;\">　　在保修期限内，我们会对维修过的机器的使用情况和维修技师的服务质量情况定期进行跟踪了解，向用户调查满意率，欢迎用户监督我们的服务工作。</p><p><br/></p>', '0', '服务流程');

-- ----------------------------
-- Table structure for `bj_server`
-- ----------------------------
DROP TABLE IF EXISTS `bj_server`;
CREATE TABLE `bj_server` (
  `id` mediumint(9) unsigned NOT NULL,
  `content` mediumtext,
  `add_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_server
-- ----------------------------
INSERT INTO `bj_server` VALUES ('12', '<p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px;\"><img alt=\"蚂蚁搬家\" src=\"http://www.4000288181.com/uploadfile/2014/0822/20140822015413721.jpg\"/></span></span></span></p><p><span style=\"margin: 0px; padding: 0px;\">源于成都，搬动世界</span><br/>&nbsp;<br/><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(105, 105, 105);\">服务介绍</span></span></strong><br/><span style=\"margin: 0px; padding: 0px;\">蚂蚁搬家，采用专用箱式搬家车辆为您提供安全、便捷的搬家之旅。<br/>业务涉及：个人搬家、家庭搬家、办公室搬迁、长途搬运、钢琴搬运、欧式实木家具搬运，空调移机、起重业务、机房搬迁、厂房搬迁、迷你仓储等专业搬运业务。</span><br/>&nbsp;</p><p><span style=\"margin: 0px; padding: 0px; color: rgb(105, 105, 105);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\">服务优势</span></strong><br/><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">超大车厢</span></span><br/><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; font-size: 14px;\">蚂蚁搬家搬家车辆均为4.2*2*1.8m的超大车厢，能容纳更多的物品。</span></span><br/><br/><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(105, 105, 105);\">专业搬家工人</span><br/><span style=\"margin: 0px; padding: 0px; font-size: 14px;\">蚂蚁搬家的搬家工人，都是经过专业培训的，服务水平、专业技能、搬家效率都是业内一流。</span></span><br/><br/><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(105, 105, 105);\">安全快速</span></span><br/><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; line-height: 25px;\">蚂蚁搬家的工人均有着丰富的搬家经验，在搬运过程中能给物品提供一个安全的搬运环境。<br/>蚂蚁搬家的车辆为全封闭厢式卡车，良好的刹车性能给驾驶员提供了一个安全的开车环境。以最优的线路为您的提供搬家服务，保证将您的搬家在最短时间内完成。</span></span><span style=\"margin: 0px; padding: 0px; font-stretch: normal; font-size: small; line-height: 25px; font-family: 微软雅黑; color: rgb(0, 0, 0);\">&nbsp;&nbsp;</span><br/>&nbsp;<br/><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(105, 105, 105);\">质量保证</span></strong><br/><span style=\"margin: 0px; padding: 0px; font-size: 14px;\">蚂蚁企业率先在搬家行业内，通过国际IS9001：2000、IS9001：2008国际质量标准管理体系认证，蚂蚁搬家服务已成为居民搬家领域的标准。</span></span></span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\"><img alt=\"蚂蚁搬家质量保证\" src=\"http://www.4000288181.com/uploadfile/2014/0822/20140822020500146.png\"/></span></strong></span></span><br/><br/>&nbsp;</p><p><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(105, 105, 105);\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\">服务范围</span></span></strong><br/>北京、上海、成都、武汉、昆明、南京、济南、贵阳、西安、广州、深圳、石家庄、南昌、重庆、无锡、杭州、南宁、绵阳、乐山、自贡、攀枝花、株洲、长沙等城市的市内搬家，全国范围内的长途搬家。</p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\"><img alt=\"蚂蚁搬家全国连锁\" src=\"http://www.4000288181.com/uploadfile/2014/0822/20140822015935349.jpg\"/></span></strong></span></span><br/><br/>&nbsp;</p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; font-size: 14px;\"><span style=\"font-family:微软雅黑\">更多蚂蚁搬家信息，请咨询在线客服或致电客户服务热线：400-028-8181</span></span></span></span></p><p><br/></p>', '0');
INSERT INTO `bj_server` VALUES ('13', '<p>公司搬迁content</p><p><br /></p><p><br /></p><p><br /></p><p><br /></p><p><br /></p>', '0');
INSERT INTO `bj_server` VALUES ('14', '<p><strong>跨省搬家content</strong></p>', '0');
INSERT INTO `bj_server` VALUES ('19', '暂无内容', '1492752276');

-- ----------------------------
-- Table structure for `bj_servercate`
-- ----------------------------
DROP TABLE IF EXISTS `bj_servercate`;
CREATE TABLE `bj_servercate` (
  `cid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sort_id` tinyint(4) unsigned NOT NULL,
  `state` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_servercate
-- ----------------------------
INSERT INTO `bj_servercate` VALUES ('12', '居民搬家', '0', '0');
INSERT INTO `bj_servercate` VALUES ('13', '公司搬迁', '1', '0');
INSERT INTO `bj_servercate` VALUES ('14', '跨省搬家', '2', '0');
INSERT INTO `bj_servercate` VALUES ('19', '工厂搬家', '1', '0');

-- ----------------------------
-- Table structure for `bj_slide`
-- ----------------------------
DROP TABLE IF EXISTS `bj_slide`;
CREATE TABLE `bj_slide` (
  `id` mediumint(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(150) NOT NULL,
  `url` varchar(150) DEFAULT NULL,
  `add_time` int(11) unsigned NOT NULL,
  `desc` mediumtext,
  `sort_id` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_slide
-- ----------------------------
INSERT INTO `bj_slide` VALUES ('1', '测试1', 'Uploads/20170422/58fb0f9620219.jpg', '2222222222222', '0', '测试1', '1');
INSERT INTO `bj_slide` VALUES ('2', '测试2', 'Uploads/20170422/58fb0ffd87d1e.jpg', '', '1492847213', '111', '1');
