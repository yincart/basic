yincart
=======

Why call yincart, not yiicart. Yincart means Yii in cart, or u can call it "yi niu", lol.

base on yiiframework , website: http://www.yincart.com

[![Latest Stable Version](https://poser.pugx.org/yinhe/yincart/v/stable.png)](https://packagist.org/packages/yinhe/yincart)
[![Total Downloads](https://poser.pugx.org/yinhe/yincart/downloads.png)](https://packagist.org/packages/yinhe/yincart)
[![Build Status](https://secure.travis-ci.org/yinhe/yincart.png)](http://travis-ci.org/yinhe/yincart) 
[![Dependency Status](https://www.versioneye.com/php/yinhe:yincart/dev-master/badge.png)](https://www.versioneye.com/php/yinhe:yincart/dev-master)

###Yincart basic 代码说明

* gii生成的model放到``models/base``，新建类继承原model，并加AR前缀。
* 前后台都需要用的module，在protected和backend的module目录都建立module代码
* 所有module的model代码统一放到protected的models目录下公用
* 代码风格请与yii框架风格统一，函数使用驼峰式命名，函数必须注释，该删除的代码请删除，不要大堆注释，
* model封装大部分逻辑，controller可以有部分逻辑，view中禁止出现从数据库获取数据的代码，所有view中的数据都应该只从controller传递

###Yincart项目结构说明

* advanced为中大型项目管理结构分支，前台入口为``frontend/www``，后台入口为``backend/www``；定位于B2B2C
* basic为小型项目管理结构分支，后台入口为``backend.php``；定位于B2C
* 请根据自己的业务需求选择
* Advanced Install
* use shopend.com redirect to the ``shopend/www`` directory
* use backend.com redirect to the ``backend/www`` directory
* use frontend.com redirect to the ``frontend/www`` directory
* use image.com redirect to the upload directory
* database: ``common/data/yincart-*(latest).sql``

###2013.8.04 1.0.7预览版

1.07版带来的变化：

* 商品相册更换为jquery upload

* 弃用商品类型，商品终极分类与其对应的属性相关联

* 商品的属性添加更新完善

* 商品的sku添加更新完善(已完成)

* 前台商品搜索实现(未完成)

* 商品详情页能展示商品的销售属性以及其他属性(未完成)

* 订单创建流程完善(未完成)

* 订单统计基本功能呈现(未完成)

* A版(advanced) 增加多店铺功能

###2013.6.16 1.0.6版本

经过一个月的开发，1.0.6预览版终于出来了，前端新皮肤正在加紧开发中。下面简单介绍本版本主要的改变：

* 在之前的基础上完善了商品属性的添加

* 引入商品类型

* 完善商品上传、商品属性以及商品相册的添加

* 增加商品批量管理

* 引入了翻译模块，实现多语言化

* 引入语言、货币、皮肤数据表

* 增加了widgets目录，便于对不同皮肤定制widgets

* 增加bootstrap的``'fontAwesomeCss' => true``属性，可使用更多图标ICON，可自行在后端配置文件关闭

* 增加了新皮肤ultimo，支持国际化，正在完善中。之前皮肤不能正常使用的需要对菜单进行自定义

* 文章和产品URL引入标题进行SEO优化，并支持汉字转拼音

* 增加站点配置模块，可通过``F::sg('site', 'name')``格式引入

* 评论和SEO模块初步引入，待完善

###2013.5.10 1.0.5版本

* 前端用户模块更新为最新版本的Yii-user,同时添加测试邮件服务器支持发送注册邮件

* 前端测试用户帐号密码更新为``demo/demo123``,数据库引擎全部更新为innodb

###2013.4.30 1.0.4版本

* 前端集成进入左右值无限分类

* 数据库配置文件在``/common/config/main-local.php``,便于GIT部署项目时直接忽略提交此文件

###2013.4.24 1.0.3版本

* 分类换成左右值无限分类，编辑器扩展引入最新的kindeditor

* 数据库完整版位于``/common/data/yincart-1.0.3.sql``

* 后台登陆帐号密码修正为admin admin123

###2013.3.24 1.0.2版本

* 前后台目录结构调整，适合中大型项目开发

* 数据库完整版位于``/common/data/yincart.sql``
* 数据库表版本更新位于``/common/migrations/``

* EER部分核心数据库设计图位于``/common/data/``

* 后台登陆帐号密码为``admin/demo``
* 前台登陆帐号密码为``demo/admin123``

* 下载后缺少assets文件，请自行创建

* 前端访问路径``webroot/frontend/www``
* 后端访问路径``webroot/backend/www``

* common/main-local.php 本地数据库配置

* 因YII框架自身比较大，所以没有包含在代码中，请按前后端index.php里的YII路径放置好框架位置


###2012.5.21 1.0.1版本

* 数据库位于``/protected/data/yincart.sql``

* EER部分核心数据库设计图位于``/protected/data/``

* 后台登陆帐号密码为``admin/admin123``

* 下载后缺少assets文件，请自行创建

* 因YII框架自身比较大，所以没有包含在代码中，请按index.php里的YII路径放置好框架位置
