# Plugin Module

Languages: [![English](http://geoip.flagfox.net/flags/US.png)](https://github.com/health901/Yii-Plugin/blob/master/README.md) [![中文](http://geoip.flagfox.net/flags/CN.png)](#)

---
![cp](http://i.minus.com/ibnW5OhPBsUboA.jpg)
## 特点
* 该模块提供了一个插件模式(即插即用)解决方案.
* 插件安装卸载无须配置任何文件,可在后台进行安装,卸载,启用,停用.
* 插件不修改项目文件,可安全卸载
* 可扩展.可在任意界面加入钩子(插件位)
* 封装Yii函数, 非Yii开发者也能快速开发插件

## 模块使用
### 安装
将以下数组添加至项目配置文件 (如果有多个入口及配置文件,在所有可能用到该模块的配置文件中都加上)
    
    'components' => array(
        'plugin' => array(
            'class' => 'application.modules.plugin.components.HookRender', # HookRender 文件的路径别名
        ),
    ),
    
    'modules' => array(
        'plugin' => array(
            'class' => 'application.modules.plugin.PluginModule', # 模块的路径别名
            'pluginRoot' => 'application.Plugins',   # 配置插件存放的目录,确保该目录可读写,默认为 'application.Plugins'
            'layout' => '//layouts/main',            # 管理面板布局文件,确保管理界面风格和整站一致,默认为 '//layouts/main'
        )
    ),

### 新建数据库表
执行sql文件夹下的sql文件(注意替换表前缀),或者使用yiic运行数据库迁移文件`m131008_064034_plugin` (使用方法见: [Yii doc](http://www.yiiframework.com/doc/guide/1.1/zh_cn/database.migration#applying-migrations))

### 链接到插件管理界面
管理面板链接地址如下 :
    
    $this->createUrl(array('/plugin/PluginManage/index'));
    
### 在视图文件中插入钩子

    # 在你要插入钩子的地方增加以下代码
    Yii::app()->plugin->render('Hook_Name');  # Hook_Name 为该处钩子的名称
    
### 依赖文件
* [Yii-bootstrap](http://www.cniska.net/yii-bootstrap/) (管理面板页菜单使用了bootstrap,如不想使用,请自行修改`views/layout/sidebar`)

---

## 插件开发
### 创建插件
要插件插件,你需要继承`Plugin`类.
插件的类名和文件名相同,以单词`Plugin`结尾.
例如, 文件 `ExamplePlugin.php`:
    
    class ExamplePlugin extends Plugin {
        //codes here
    }
`Example` (去掉 `Plugin`) 就是插件的 __identify__ 属性(_区分大小写_).

###插件功能实现
要实现一个能工作的插件, 你需要配置相关属性,以及继承一些方法.

    class ExamplePlugin extends Plugin {
        
        public function init() {                    #插件初始化,配置插件信息 必须
            // set plugin's info
            $this->identify = 'Example';            #必要参数, 插件的唯一标识.
            $this->name = 'Example Plugin';         #必要参数, 插件的显示名称.
            $this->version = '1.0';                 #插件版本号
            $this->description = 'description here';    #插件描述
            $this->copyright = '&copy; Robin &lt;Robin@email.com&gt;'; #插件版权信息
            $this->website = 'http://example.com';      #网站
            $this->icon = 'icon.png'; #插件图标,最大72*72, 如果不设置将使用默认图标;
        }
        
        // 返回要使用的钩子的数组,值是钩子对应的方法名
        public function Hooks(){
            return array(
                //'钩子名称' => '钩子方法';
                'Hook_Index_Header' => 'header',
            );
        }
        
        // 钩子对应的方法
        public function header(){
            // some codes here
            echo '这将在显示在 Hook_Index_Header 钩子处';
        }
        
        // 如果你想显示一个单页(独立url)而不是在页面中渲染一个小组件,
        // 你可以在方法名前"action"单词予以标识, "action"后的就是该动作的动作名
        // e.g.:
        public function actionPage() {
            echo "此action有如下url(以下rul带伪静态):";
            # 域名/plugin<模块名>/plugin<控制器名>/index<动作分发Action>
            # ?id=xx<插件唯一标识>&action=xxx<插件内单页动作名>
            echo "You_Domain.com/plugin/plugin/index?id=example&action=page";

            #可以通过调用方法 'createUrl' 来生成该链接
            echo $this->createUrl('page',array('param'=>'test'));
        }
        
        public function actionExample(){
            # 这个动作以该插件的identify命名
            # $action 参数可以留空或者设为非真值
            echo $this->createUrl();
        }

        // 如果你的插件需要在后台进行相关配置
        // 可以继承此方法:
        public function admincp() {
            // You can put codes here.
            // Like some inputs
            $this->setSetting('key','value');   # 写入配置
            echo $this->getSetting('key');      # 读取配置
        }
        
        // 继承下面两个函数可以在安装和卸载时进行额外的操作
        public function Install() {
            //codes here
            $sql = "create `tbl_xxxxxx` .....";     # 使用带表前缀的sql语句
            $this->query($sql,'tbl_');              # 并将表前缀传入query函数
                                                    # 默认表前缀为'tbl_'
            return true; #此方法必须返回true,否则安装无法正常完成
        }
        
        public function Uninstall() {
            // just like the method install.
            return true; #此方法必须返回true,否则卸载无法正常完成
        }
        
        // 一个简单的插件就完成了
        // 高级使用方法,见Demo
    }