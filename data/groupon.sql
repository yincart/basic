/*
Navicat MySQL Data Transfer

Source Server         : lonxom
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : yincart

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2013-08-19 10:40:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `groupon`
-- ----------------------------
DROP TABLE IF EXISTS `groupon`;
CREATE TABLE `groupon` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) character set utf8 NOT NULL COMMENT '长标题',
  `short_title` varchar(18) character set utf8 NOT NULL COMMENT '短信标题',
  `sms_title` varchar(10) character set utf8 NOT NULL COMMENT '手机短信标题',
  `image` varchar(128) character set utf8 NOT NULL default '' COMMENT '主图',
  `cate_1_id` int(10) unsigned NOT NULL COMMENT '一级分类',
  `cate_2_id` int(10) unsigned NOT NULL COMMENT '二级分类',
  `cate_3_id` int(10) unsigned NOT NULL default '0' COMMENT '三级分类',
  `biz_id` int(10) unsigned NOT NULL COMMENT '商家id',
  `contract_id` int(10) unsigned NOT NULL COMMENT '合同id',
  `price` double(10,2) unsigned NOT NULL default '0.00' COMMENT '团购价',
  `market_price` double(10,2) unsigned NOT NULL default '0.00' COMMENT '市场价',
  `cost` double(10,2) unsigned NOT NULL default '0.00' COMMENT '成本价',
  `begin_time` int(10) unsigned NOT NULL default '0' COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL default '0' COMMENT '结束时间',
  `expire_time` int(10) unsigned NOT NULL default '0' COMMENT '过期时间',
  `per_number` int(10) unsigned NOT NULL default '0' COMMENT '每人限购',
  `once_number` int(10) unsigned NOT NULL default '0' COMMENT '每单限购',
  `begin_number` int(10) unsigned NOT NULL default '1' COMMENT '起购数量',
  `now_number` int(10) unsigned NOT NULL default '0' COMMENT '目前销量',
  `pre_number` int(10) unsigned NOT NULL default '0' COMMENT '加水量',
  `max_number` int(11) NOT NULL default '-1' COMMENT '库存',
  `display` tinyint(3) unsigned NOT NULL default '1' COMMENT '是否显示1显示0不显示',
  `sort` int(10) unsigned NOT NULL default '0' COMMENT '站内排序值',
  `is_copy` tinyint(3) unsigned NOT NULL default '0' COMMENT '是否为复制项目',
  `examine_status` tinyint(3) unsigned NOT NULL default '1' COMMENT '1=草稿 2=提交审核3=销售审核通过等待编辑4=销售审核失败 5=编辑完成等待审核 6=编辑审核失败7=编辑审核成功等待上线',
  `examine_id` int(10) unsigned NOT NULL default '0' COMMENT '审核人id',
  `examine_reason` varchar(128) character set utf8 NOT NULL default '' COMMENT '审核原因',
  `create_id` int(10) unsigned NOT NULL default '0' COMMENT '项目创建者id',
  `create_time` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL default '0' COMMENT '更新时间',
  PRIMARY KEY  (`id`),
  KEY `cate_1_id` (`cate_1_id`,`cate_2_id`,`cate_3_id`,`biz_id`,`contract_id`,`price`,`begin_time`,`end_time`,`display`,`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购项目主表';

-- ----------------------------
-- Records of groupon
-- ----------------------------

-- ----------------------------
-- Table structure for `groupon_attach`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_attach`;
CREATE TABLE `groupon_attach` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `relation_id` int(10) unsigned NOT NULL COMMENT '关联表id',
  `relation_type` enum('contract','biz','groupon') collate utf8_unicode_ci NOT NULL default 'contract' COMMENT '关联类型 默认合同',
  `file_name` varchar(128) character set utf8 NOT NULL default '' COMMENT '文件名',
  `file_path` varchar(128) character set utf8 NOT NULL default '' COMMENT '文件路径',
  `title` varchar(128) character set utf8 NOT NULL default '' COMMENT '图片标题',
  `create_time` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `relation_id` (`relation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同等附件表';

-- ----------------------------
-- Records of groupon_attach
-- ----------------------------

-- ----------------------------
-- Table structure for `groupon_attr`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_attr`;
CREATE TABLE `groupon_attr` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `groupon_id` int(10) unsigned NOT NULL COMMENT '团购id',
  `note` text character set utf8 NOT NULL COMMENT '温馨提示',
  `detail` text character set utf8 NOT NULL COMMENT '商品详情（表格）',
  `info` text character set utf8 NOT NULL COMMENT '图文介绍',
  `create_time` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL default '0' COMMENT '更新时间',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `groupon_id` (`groupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购属性表';

-- ----------------------------
-- Records of groupon_attr
-- ----------------------------

-- ----------------------------
-- Table structure for `groupon_biz`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_biz`;
CREATE TABLE `groupon_biz` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(32) character set utf8 NOT NULL default '' COMMENT '用户名',
  `password` varchar(32) character set utf8 NOT NULL default '' COMMENT '密码',
  `title` varchar(128) character set utf8 NOT NULL COMMENT '商家名称',
  `license_photo` varchar(128) character set utf8 NOT NULL default '' COMMENT '营业执照',
  `contact` varchar(32) character set utf8 NOT NULL default '' COMMENT '联系人',
  `phone` varchar(18) collate utf8_unicode_ci NOT NULL default '' COMMENT '联系电话',
  `mobile` char(11) collate utf8_unicode_ci NOT NULL default '' COMMENT '手机号',
  `bank_user` varchar(18) character set utf8 NOT NULL default '' COMMENT '开户名',
  `bank_name` varchar(128) character set utf8 NOT NULL default '' COMMENT '开户行',
  `bank_child` varchar(128) character set utf8 NOT NULL default '' COMMENT '支行信息',
  `bank_no` varchar(32) character set utf8 NOT NULL default '' COMMENT '银行账号',
  `create_id` int(10) unsigned NOT NULL default '0' COMMENT '创建者id',
  `examine_status` tinyint(3) unsigned NOT NULL default '1' COMMENT '1=草稿状态 2=审核提交 3=审核通过 4=审核驳回',
  `examine_id` int(10) unsigned NOT NULL default '0' COMMENT '审核人id',
  `examine_reason` varchar(128) character set utf8 NOT NULL default '' COMMENT '审核原因',
  `create_time` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL default '0' COMMENT '更新时间',
  `display` tinyint(3) unsigned NOT NULL default '1' COMMENT '是否显示1显示0不显示',
  PRIMARY KEY  (`id`),
  KEY `examine_status` (`examine_status`,`display`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购商家主表';

-- ----------------------------
-- Records of groupon_biz
-- ----------------------------
INSERT INTO `groupon_biz` VALUES ('1', '久久', '123456', 'test', '', '张久龙', '', '13910799432', '张三', '北京银行', '中关村支行', '6222020256788654', '0', '1', '0', '', '0', '0', '1');
INSERT INTO `groupon_biz` VALUES ('2', '张三', '123456', 'test', '', '张久龙', '', '13910799432', '张三', '北京银行', '中关村支行', '6222020256788654', '2', '1', '0', '', '1376201258', '1376201258', '1');
INSERT INTO `groupon_biz` VALUES ('3', '张三', '123456', 'test', '', '张久龙', '', '13910799432', '张三', '北京银行', '中关村支行', '6222020256788654', '2', '1', '0', '', '1376201985', '1376201985', '1');
INSERT INTO `groupon_biz` VALUES ('4', '张三', '123456', 'test', '', '张久龙', '', '13910799432', '张三', '北京银行', '中关村支行', '6222020256788654', '2', '1', '0', '', '1376202047', '1376202047', '1');
INSERT INTO `groupon_biz` VALUES ('5', '张三', '123456', 'dsadasfa', 'upload/groupon/2013/08/137620660866313.png', '张三', '', '13910799432', '张三', '北京银行', '中关村支行', '6222020256788654', '2', '1', '0', '', '1376206608', '1376207594', '1');
INSERT INTO `groupon_biz` VALUES ('6', '张三', '123456', 'dadsfadfa', 'upload/groupon/2013/08/137620999324820.png', '张久龙', '', '13910799432', '张三', '北京银行', '中关村支行', '6222020256788654', '2', '1', '0', '', '1376209993', '1376209993', '1');
INSERT INTO `groupon_biz` VALUES ('7', '撒范德萨发', '32432432', '阿萨德发的', '', '爱的色放', '', '13910799432', '张三', '北京银行', '中关村支行', '42345467678568578568', '0', '1', '0', '', '1376573243', '1376573243', '1');

-- ----------------------------
-- Table structure for `groupon_biz_shop`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_biz_shop`;
CREATE TABLE `groupon_biz_shop` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `biz_id` int(10) unsigned NOT NULL COMMENT '商家id',
  `name` varchar(128) character set utf8 NOT NULL COMMENT '分店名',
  `service_tel` varchar(128) character set utf8 NOT NULL COMMENT '预约电话',
  `address` varchar(255) character set utf8 NOT NULL default '' COMMENT '分店地址',
  `travel_info` varchar(255) character set utf8 NOT NULL default '' COMMENT '公交信息',
  `open_time` varchar(255) character set utf8 NOT NULL default '' COMMENT '营业时间',
  `province_id` int(10) unsigned NOT NULL default '0' COMMENT '省份id',
  `city_id` int(10) unsigned NOT NULL default '0' COMMENT '城市id',
  `area_id` int(10) unsigned NOT NULL default '0' COMMENT '区域id',
  `cbd_id` int(10) unsigned NOT NULL default '0' COMMENT '商圈id',
  `lnglat` varchar(64) character set utf8 NOT NULL default '' COMMENT '经纬度',
  `is_reservation` tinyint(3) unsigned NOT NULL default '1' COMMENT '是否需要预约1需要0不需要',
  `create_time` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL default '0' COMMENT '更新时间',
  PRIMARY KEY  (`id`),
  KEY `biz_id` (`biz_id`,`city_id`,`area_id`,`cbd_id`,`is_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商家分店';

-- ----------------------------
-- Records of groupon_biz_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `groupon_cates`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_cates`;
CREATE TABLE `groupon_cates` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) character set utf8 NOT NULL COMMENT '分类名',
  `ename` varchar(20) character set utf8 NOT NULL COMMENT '分类别名',
  `pid` int(10) unsigned NOT NULL default '0' COMMENT '父级id',
  `level` tinyint(3) unsigned NOT NULL default '1' COMMENT '等级',
  `path` varchar(255) collate utf8_unicode_ci NOT NULL default '' COMMENT '分类路径',
  `is_hot` tinyint(3) unsigned NOT NULL default '0' COMMENT '是否热门0不热 1热',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ename` (`ename`),
  KEY `pid` (`pid`,`level`,`path`,`is_hot`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购分类表';

-- ----------------------------
-- Records of groupon_cates
-- ----------------------------
INSERT INTO `groupon_cates` VALUES ('1', '餐饮美食', 'canyinmeishi', '0', '1', '0,', '0');
INSERT INTO `groupon_cates` VALUES ('2', '休闲娱乐', 'xiuxianyule', '0', '1', '0,', '0');
INSERT INTO `groupon_cates` VALUES ('3', '旅游住宿', 'lvyouzhusu', '0', '1', '0,', '0');
INSERT INTO `groupon_cates` VALUES ('4', '生活服务', 'shenghuofuwu', '0', '1', '0,', '0');
INSERT INTO `groupon_cates` VALUES ('5', '丽人', 'liren', '0', '1', '0,', '0');
INSERT INTO `groupon_cates` VALUES ('6', '网上购物', 'wangshanggouwu', '0', '1', '0,', '0');
INSERT INTO `groupon_cates` VALUES ('7', '火锅', 'huoguo', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('8', '烧烤', 'shaokao', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('9', '西餐', 'xican', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('10', '海鲜', 'haixian', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('11', '地方菜', 'difangcai', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('12', '烤鱼', 'kaoyu', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('13', '麻辣香锅', 'malaxiangguo', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('14', '日韩料理', 'rihanliaoli', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('15', '东南亚菜', 'dongnanyacai', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('16', '快餐', 'kuaican', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('17', '咖啡', 'kafei', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('18', '下午茶', 'xiawucha', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('19', '蛋糕', 'dangao', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('20', '其他', 'qitacanyin', '1', '2', '0,1,', '0');
INSERT INTO `groupon_cates` VALUES ('21', '电影', 'dianying', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('22', 'KTV', 'ktv', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('23', '运动健身', 'yundongjianshen', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('24', '游乐电玩', 'youledianwan', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('25', '展览演出', 'zhanlanyanchu', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('26', '足疗按摩', 'zhuliaoanmo', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('27', '洗浴', 'xiyu', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('28', '采摘', 'caizhai', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('29', '滑雪', 'huaxue', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('30', '温泉', 'wenquan', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('31', '其他', 'qitaxiuxian', '2', '2', '0,2,', '0');
INSERT INTO `groupon_cates` VALUES ('32', '酒店', 'jiudian', '3', '2', '0,3,', '0');
INSERT INTO `groupon_cates` VALUES ('33', '旅游', 'lvyou', '3', '2', '0,3,', '0');
INSERT INTO `groupon_cates` VALUES ('34', '景点公园', 'jingdiangongyuan', '3', '2', '0,3,', '0');
INSERT INTO `groupon_cates` VALUES ('35', '其他', 'qitalvyou', '3', '2', '0,3,', '0');
INSERT INTO `groupon_cates` VALUES ('36', '写真', 'xiezhen', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('37', '婚纱摄影', 'hunshasheying', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('38', '儿童摄影', 'ertongsheying', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('39', '汽车养护', 'qicheyanghu', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('40', '教育培训', 'jiaoyupeixun', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('41', '体检', 'tijian', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('42', '配镜', 'peijing', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('43', '口腔', 'kouqiang', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('44', '鲜花配送', 'xianhuapeisong', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('45', '婚庆策划', 'hunqingcehua', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('46', '其他', 'qitashenghuo', '4', '2', '0,4,', '0');
INSERT INTO `groupon_cates` VALUES ('47', '美发', 'meifa', '5', '2', '0,5,', '0');
INSERT INTO `groupon_cates` VALUES ('48', '美甲', 'meijia', '5', '2', '0,5,', '0');
INSERT INTO `groupon_cates` VALUES ('49', '美容美体', 'meirongmeiti', '5', '2', '0,5,', '0');
INSERT INTO `groupon_cates` VALUES ('50', '其他', 'qitaliren', '5', '2', '0,5,', '0');
INSERT INTO `groupon_cates` VALUES ('51', '服装', 'fuzhuang', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('52', '生活家居', 'shenghuojiaju', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('53', '食品饮料', 'shipinyinliao', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('54', '化妆品', 'huazhuangpin', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('55', '箱包', 'xiangbao', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('56', '家用电器', 'jiayongdianqi', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('57', '手机数码', 'shoujishuma', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('58', '鞋靴', 'xiexue', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('59', '饰品', 'shipin', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('60', '手表', 'shoubiao', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('61', '母婴用品', 'muyinyongpin', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('62', '玩具', 'wanju', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('63', '礼品', 'lipin', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('64', '其他', 'qitagouwu', '6', '2', '0,6,', '0');
INSERT INTO `groupon_cates` VALUES ('65', '羊肉涮锅', 'yangroushuanguo', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('66', '羊蝎子', 'yangxiezi', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('67', '豆捞', 'doulao', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('68', '川味火锅', 'chuanweihuoguo', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('69', '鱼火锅', 'yuhuoguo', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('70', '肥牛火锅', 'feiniuhuoguo', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('71', '其他', 'qitahuoguo', '7', '3', '0,1,7,', '0');
INSERT INTO `groupon_cates` VALUES ('72', '烤羊腿', 'kaoyangtui', '8', '3', '0,1,8,', '0');
INSERT INTO `groupon_cates` VALUES ('73', '韩式烧烤', 'hanshisaokao', '8', '3', '0,1,8,', '0');
INSERT INTO `groupon_cates` VALUES ('74', '铁板烧', 'tiebansao', '8', '3', '0,1,8,', '0');
INSERT INTO `groupon_cates` VALUES ('75', '其他', 'qitasaokao', '8', '3', '0,1,8,', '0');
INSERT INTO `groupon_cates` VALUES ('76', '川菜', 'chuancai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('77', '湘菜', 'xiangcai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('78', '东北菜', 'dongbeicai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('79', '江浙菜', 'jiangzhecai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('80', '粤菜', 'yuecai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('81', '西北菜', 'xibeicai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('82', '鲁菜', 'lucai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('83', '新疆清真', 'xinjiangqingzhen', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('84', '云贵菜', 'yunguicai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('85', '家常菜', 'jiachangcai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('86', '其他', 'qitadifangcai', '11', '3', '0,1,11,', '0');
INSERT INTO `groupon_cates` VALUES ('87', '日本菜', 'ribencai', '14', '3', '0,1,14,', '0');
INSERT INTO `groupon_cates` VALUES ('88', '韩国料理', 'hanguoliaoli', '14', '3', '0,1,14,', '0');
INSERT INTO `groupon_cates` VALUES ('89', '其他', 'qitarihanliaoli', '14', '3', '0,1,14,', '0');
INSERT INTO `groupon_cates` VALUES ('90', '披萨', 'pisa', '16', '3', '0,1,16,', '0');
INSERT INTO `groupon_cates` VALUES ('91', '小吃', 'xiaochi', '16', '3', '0,1,16,', '0');
INSERT INTO `groupon_cates` VALUES ('92', '其他', 'qitakuaican', '16', '3', '0,1,16,', '0');
INSERT INTO `groupon_cates` VALUES ('93', '游泳', 'youyong', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('94', '羽毛球', 'yumaoqiu', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('95', '台球', 'taiqiu', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('96', '保龄球', 'baolingqiu', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('97', '瑜伽', 'yujia', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('98', '舞蹈', 'wudao', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('99', '健身中心', 'jianshenzhongxin', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('100', '滑雪滑冰', 'huaxuehuabing', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('101', '其他', 'qitayundongjianshen', '23', '3', '0,2,23,', '0');
INSERT INTO `groupon_cates` VALUES ('102', '桌游', 'zhuoyou', '24', '3', '0,2,24,', '0');
INSERT INTO `groupon_cates` VALUES ('103', '电玩', 'dianwan', '24', '3', '0,2,24,', '0');
INSERT INTO `groupon_cates` VALUES ('104', '密室逃生', 'mishitaosheng', '24', '3', '0,2,24,', '0');
INSERT INTO `groupon_cates` VALUES ('105', '真人cs', 'zhenrencs', '24', '3', '0,2,24,', '0');
INSERT INTO `groupon_cates` VALUES ('106', '游乐园', 'youleyuan', '24', '3', '0,2,24,', '0');
INSERT INTO `groupon_cates` VALUES ('107', '其他', 'qitayoule', '24', '3', '0,2,24,', '0');
INSERT INTO `groupon_cates` VALUES ('108', '话剧', 'huaju', '25', '3', '0,2,25,', '0');
INSERT INTO `groupon_cates` VALUES ('109', '相声', 'xiangsheng', '25', '3', '0,2,25,', '0');
INSERT INTO `groupon_cates` VALUES ('110', '演唱会', 'yanchanghui', '25', '3', '0,2,25,', '0');
INSERT INTO `groupon_cates` VALUES ('111', '其他', 'qitazhanlanyanchu', '25', '3', '0,2,25,', '0');
INSERT INTO `groupon_cates` VALUES ('112', '快捷酒店', 'kuaijiejiudian', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('113', '度假村', 'dujiacun', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('114', '五星级', 'wuxingji', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('115', '四星级', 'sixingji', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('116', '三星级', 'sanxingji', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('117', '青年旅社', 'qingnianlvshe', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('118', '其他', 'qitajiudian', '32', '3', '0,3,32,', '0');
INSERT INTO `groupon_cates` VALUES ('119', '周边游', 'zhoubianyou', '33', '3', '0,3,33,', '0');
INSERT INTO `groupon_cates` VALUES ('120', '自由行', 'ziyouxing', '33', '3', '0,3,33,', '0');
INSERT INTO `groupon_cates` VALUES ('121', '跟团游', 'gentuanyou', '33', '3', '0,3,33,', '0');
INSERT INTO `groupon_cates` VALUES ('122', '其他', 'qitayou', '33', '3', '0,3,33,', '0');
INSERT INTO `groupon_cates` VALUES ('123', '女装', 'nvzhuang', '51', '3', '0,6,51,', '0');
INSERT INTO `groupon_cates` VALUES ('124', '男装', 'nanzhuang', '51', '3', '0,6,51,', '0');
INSERT INTO `groupon_cates` VALUES ('125', '童装', 'tongzhuang', '51', '3', '0,6,51,', '0');
INSERT INTO `groupon_cates` VALUES ('126', '内衣', 'neiyi', '51', '3', '0,6,51,', '0');
INSERT INTO `groupon_cates` VALUES ('127', '袜子', 'wazi', '51', '3', '0,6,51,', '0');
INSERT INTO `groupon_cates` VALUES ('128', '其他', 'qitafuzhuang', '51', '3', '0,6,51,', '0');
INSERT INTO `groupon_cates` VALUES ('129', '床上用品', 'chuangshangyongpin', '52', '3', '0,6,52,', '0');
INSERT INTO `groupon_cates` VALUES ('130', '生活日用', 'shenghuoriyong', '52', '3', '0,6,52,', '0');
INSERT INTO `groupon_cates` VALUES ('131', '清洁用品', 'qingjieyongpin', '52', '3', '0,6,52,', '0');
INSERT INTO `groupon_cates` VALUES ('132', '厨具', 'chuju', '52', '3', '0,6,52,', '0');
INSERT INTO `groupon_cates` VALUES ('133', '成人用品', 'chengrenyongpin', '52', '3', '0,6,52,', '0');
INSERT INTO `groupon_cates` VALUES ('134', '其他', 'qitashenghuojiaju', '52', '3', '0,6,52,', '0');
INSERT INTO `groupon_cates` VALUES ('135', '零食', 'lingshi', '53', '3', '0,6,53,', '0');
INSERT INTO `groupon_cates` VALUES ('136', '茶酒饮料', 'chajiuyinliao', '53', '3', '0,6,53,', '0');
INSERT INTO `groupon_cates` VALUES ('137', '保健品', 'baojianpin', '53', '3', '0,6,53,', '0');
INSERT INTO `groupon_cates` VALUES ('138', '粮油蔬果', 'liangyoushuguo', '53', '3', '0,6,53,', '0');
INSERT INTO `groupon_cates` VALUES ('139', '其他', 'qitashipinyinliao', '53', '3', '0,6,53,', '0');
INSERT INTO `groupon_cates` VALUES ('140', '面部保养', 'mianbubaoyang', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('141', '眼唇保养', 'yanchunbaoyang', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('142', '身体护理', 'shentihuli', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('143', '彩妆', 'caizhuang', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('144', '香水', 'xiangshui', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('145', '美容工具', 'meironggongju', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('146', '其他', 'qitahuazhuangpin', '54', '3', '0,6,54,', '0');
INSERT INTO `groupon_cates` VALUES ('147', '女包-单肩', 'nvbaodanjian', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('148', '女包-手提', 'nvbaoshouti', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('149', '女包-斜挎', 'nvbaoxiekua', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('150', '女包-钱包', 'nvbaoqianbao', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('151', '男包-单肩', 'nanbaodanjian', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('152', '男包-手提', 'nanbaoshouti', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('153', '男包-钱包', 'nanbaoqianbao', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('154', '功能箱包', 'nanbaogongnengbao', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('155', '运动包', 'yundongbao', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('156', '其他', 'qitaxiangbao', '55', '3', '0,6,55,', '0');
INSERT INTO `groupon_cates` VALUES ('157', '生活电器', 'shenghuodianqi', '56', '3', '0,6,56,', '0');
INSERT INTO `groupon_cates` VALUES ('158', '厨房电器', 'chufangdianqi', '56', '3', '0,6,56,', '0');
INSERT INTO `groupon_cates` VALUES ('159', '个人护理', 'gerenhuli', '56', '3', '0,6,56,', '0');
INSERT INTO `groupon_cates` VALUES ('160', '健康电器', 'jiankangdianqi', '56', '3', '0,6,56,', '0');
INSERT INTO `groupon_cates` VALUES ('161', '其他', 'qitajiayongdianqi', '56', '3', '0,6,56,', '0');
INSERT INTO `groupon_cates` VALUES ('162', '手机', 'shouji', '57', '3', '0,6,57,', '0');
INSERT INTO `groupon_cates` VALUES ('163', '手机配件', 'shoujipeijian', '57', '3', '0,6,57,', '0');
INSERT INTO `groupon_cates` VALUES ('164', '摄影摄像', 'sheyingshexiang', '57', '3', '0,6,57,', '0');
INSERT INTO `groupon_cates` VALUES ('165', '电脑数码', 'diannaoshuma', '57', '3', '0,6,57,', '0');
INSERT INTO `groupon_cates` VALUES ('166', '时尚影音', 'shishangyingyin', '57', '3', '0,6,57,', '0');
INSERT INTO `groupon_cates` VALUES ('167', '其他', 'qitashoujishuma', '57', '3', '0,6,57,', '0');
INSERT INTO `groupon_cates` VALUES ('168', '女鞋', 'nvxie', '58', '3', '0,6,58,', '0');
INSERT INTO `groupon_cates` VALUES ('169', '男鞋', 'nanxie', '58', '3', '0,6,58,', '0');
INSERT INTO `groupon_cates` VALUES ('170', '运动鞋', 'yundongxie', '58', '3', '0,6,58,', '0');
INSERT INTO `groupon_cates` VALUES ('171', '童鞋', 'tongxie', '58', '3', '0,6,58,', '0');
INSERT INTO `groupon_cates` VALUES ('172', '其他', 'qitaxiexue', '58', '3', '0,6,58,', '0');
INSERT INTO `groupon_cates` VALUES ('173', '眼镜', 'yanjing', '59', '3', '0,6,59,', '0');
INSERT INTO `groupon_cates` VALUES ('174', '围巾', 'weijin', '59', '3', '0,6,59,', '0');
INSERT INTO `groupon_cates` VALUES ('175', '皮带', 'pidai', '59', '3', '0,6,59,', '0');
INSERT INTO `groupon_cates` VALUES ('176', '首饰', 'shoushi', '59', '3', '0,6,59,', '0');
INSERT INTO `groupon_cates` VALUES ('177', '其他', 'qitashiping', '59', '3', '0,6,59,', '0');
INSERT INTO `groupon_cates` VALUES ('178', '妈妈用品', 'mamayongpin', '61', '3', '0,6,61,', '0');
INSERT INTO `groupon_cates` VALUES ('179', '宝宝用品', 'baobaoyongpin', '61', '3', '0,6,61,', '0');
INSERT INTO `groupon_cates` VALUES ('180', '其他', 'qitamyyingyongpin', '61', '3', '0,6,61,', '0');

-- ----------------------------
-- Table structure for `groupon_contract`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_contract`;
CREATE TABLE `groupon_contract` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) character set utf8 NOT NULL default '' COMMENT '合同名称',
  `biz_id` int(10) unsigned NOT NULL COMMENT '商家id',
  `sign_time` int(10) unsigned NOT NULL default '0' COMMENT '合同签订时间',
  `online_time` int(10) unsigned NOT NULL default '0' COMMENT '预计上线时间',
  `end_time` int(10) unsigned NOT NULL default '0' COMMENT '团购结束时间',
  `create_id` int(10) unsigned NOT NULL default '0' COMMENT '签约人',
  `if_billing` tinyint(3) unsigned NOT NULL default '0' COMMENT '是否开发票 0=不开发票 1=需要开具发票',
  `examine_status` tinyint(3) unsigned NOT NULL default '1' COMMENT '合同状态1=待提交2=待审核3=审核通过4=驳回5=废除',
  `examine_id` int(10) unsigned NOT NULL default '0' COMMENT '审核人id',
  `examine_reason` varchar(128) character set utf8 NOT NULL default '' COMMENT '审核原因',
  `create_time` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL default '0' COMMENT '更新时间',
  PRIMARY KEY  (`id`),
  KEY `biz_id` (`biz_id`,`examine_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购商家合同';

-- ----------------------------
-- Records of groupon_contract
-- ----------------------------

-- ----------------------------
-- Table structure for `groupon_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_coupon`;
CREATE TABLE `groupon_coupon` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `code` varchar(16) character set utf8 NOT NULL COMMENT '券号',
  `pass` char(6) character set utf8 NOT NULL default '' COMMENT '券密码',
  `groupon_id` int(10) unsigned NOT NULL COMMENT '团购id',
  `biz_id` int(10) unsigned NOT NULL COMMENT '商家id',
  `order_id` bigint(20) unsigned NOT NULL COMMENT '订单id',
  `user_id` int(10) unsigned NOT NULL default '0' COMMENT '用户id',
  `status` tinyint(3) unsigned NOT NULL default '1' COMMENT '1未消费2已消费3已退款4已过期',
  `sms` tinyint(3) unsigned NOT NULL default '1' COMMENT '短信发送次数',
  `consume_time` int(10) unsigned NOT NULL default '0' COMMENT '消费时间',
  `ref_time` int(10) unsigned NOT NULL default '0' COMMENT '退款时间',
  `expire_time` int(10) unsigned NOT NULL default '0' COMMENT '过期时间',
  `create_time` int(10) unsigned NOT NULL default '0' COMMENT '创建时间',
  `seller_id` int(10) unsigned NOT NULL default '0' COMMENT '销售员id',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `groupon_id` (`groupon_id`,`biz_id`,`order_id`,`pass`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购券表';

-- ----------------------------
-- Records of groupon_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `groupon_shop`
-- ----------------------------
DROP TABLE IF EXISTS `groupon_shop`;
CREATE TABLE `groupon_shop` (
  `groupon_id` int(10) unsigned NOT NULL COMMENT '团购id',
  `shop_id` int(10) unsigned NOT NULL COMMENT '分店id',
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`groupon_id`,`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团购项目和分店关系表';

-- ----------------------------
-- Records of groupon_shop
-- ----------------------------
