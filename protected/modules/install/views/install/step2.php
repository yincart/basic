<?php
/* @var $this Step3Controller */

$this->breadcrumbs=array(
    'Step3',
);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div id='postloader' class='waitpage'></div>
<form method="post" action="<?php echo $this->createUrl('install/step3'); ?>">

    <div class="main">
        <div class="pleft">
            <dl class="setpbox t1">
                <dt>安装步骤</dt>
                <dd>
                    <ul>
                        <li class="succeed">许可协议</li>
                        <li class="succeed">环境检测</li>
                        <li class="now">参数配置</li>
                        <li>正在安装</li>
                        <li>安装完成</li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="pright">
            <div class="pr-title"><h3>模块选择</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td style='line-height:180%'>
                        <b>默认已安装模块(不需要可在后台卸载)：</b><br />
                        百度新闻、文件管理器、挑错管理、广告管理、投票模块、友情链接、bShare分享插件<br />
                        <b>已下载并可选安装的：（不能选中的为未下载）</b><br />
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='0a7bea5dbe571d35def883cbec796437' /> 留言簿模块</div>
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='59155be87ea60c5c65ec1f7a46a0fc9d' /> 手机WAP浏览</div>
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='8964eda9013d1df0afea08ed63243436' /> 站内新闻</div>
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='be722dbfa3cb3cb5628aab2d767ff62e' /> 问答模块</div>
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='dfcb5cd4d7bc0e3f7eb655e62dd6bc64' /> 圈子模块</div>
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='c10bb6ac52082ab3e669b4814b44a6f1' /> 邮件订阅</div>
                        <div class='modulesel'><input type='checkbox' name='modules[]'  value='8a4773468b800900dcfefbc5988833ed' /> UCenter模块</div>
                    </td>
                </tr>
            </table>
            <div class="pr-title"><h3>数据库设定</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td class="onetd"><strong>数据库主机：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'dbhost'); ?>
                        <small>一般为localhost</small></td>
                </tr>
                <tr>
                    <td class="onetd"><strong>数据库用户：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'dbuser'); ?>
                </tr>
                <tr>
                    <td class="onetd"><strong>数据库密码：</strong></td>
                    <td>
                        <div style='float:left;margin-right:3px;'><?php echo CHtml::activeTelField($model, 'dbpwd'); ?></div>
                        <div style='float:left' id='dbpwdsta'></div>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>数据表前缀：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'dbprefix'); ?>
                        <small>如无特殊需要,请不要修改</small></td>
                </tr>
                <tr>
                    <td class="onetd"><strong>数据库名称：</strong></td>
                    <td>
                        <div style='float:left;margin-right:3px;'><?php echo CHtml::activeTelField($model, 'dbname'); ?></div>
                        <div style='float:left' id='havedbsta'></div>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>数据库编码：</strong></td>
                    <td>
                        <?php
                        if($s_lang=='utf-8')
                        {
                        ?>
                            <input type="radio" name="dblang" id="dblang_utf8" value="utf8" checked="checked" /><label for="dblang_latin1">UTF8</label>
                            <input type="radio" name="dblang" id="dblang_gbk" value="gbk" checked="checked" /><label for="dblang_gbk">GBK</label>
                            <input type="radio" name="dblang" id="dblang_latin1" value="latin1" /><label for="dblang_latin1">LATIN1</label>
                        <?php
                        }

                        ?>
                        <small>仅对4.1+以上版本的MySql选择</small>
                    </td>
                </tr>
            </table>

            <div class="pr-title"><h3>管理员初始密码</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td class="onetd"><strong>用户名：</strong></td>
                    <td>
                        <?php echo CHtml::activeTelField($model, 'adminuser'); ?>
                        <p><small>只能用'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'以内范围的字符</small></p>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>密　码：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'adminpwd'); ?> </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>Cookie加密码：</strong></td>
                    <td><input name="cookieencode" type="text" value="<?php echo $rnd_cookieEncode; ?>" class="input-txt" /></td>
                </tr>
            </table>

            <div class="pr-title"><h3>网站设置</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td class="onetd"><strong>网站名称：</strong></td>
                    <td>
                        <?php echo CHtml::activeTelField($model, 'webname'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>管理员邮箱：</strong></td>
                    <td> <?php echo CHtml::activeTelField($model, 'adminmail'); ?></td>
                </tr>
                <tr>
                    <td class="onetd"><strong> 网站网址：</strong></td>
                    <td><input name="baseurl" type="text" value="<?php echo $baseurl; ?>" class="input-txt" /></td>
                </tr>
                <tr>
                    <td class="onetd"><strong>CMS安装目录：</strong></td>
                    <td><input name="cmspath" type="text" class="input-txt" value="<?php echo $basepath; ?>" /><small>在根目录安装时不必理会</small></td>
                </tr>
            </table>

            <div class="pr-title"><h3>安装测试体验数据</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td width="168"><strong>
                            初始化数据体验包</strong>：</td>
                    <?php
                    if($isdemosign == 0)
                    {
                        ?>
                        <td width="558"><div class="olink" id="_remotesta"><div style="float:left">&nbsp; <font color="red">[×]</font> 不存在</div><a href="javascript:GetRemoteDemo()">远程获取</a></div></td>
                    <?php
                    } else {
                        ?>
                        <td width="558">&nbsp; <font color="green">[√]</font> 存在(您可以选择安装进行体验)</td>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="2"><label for="installdemo"><strong>
                                <input name="installdemo" type="checkbox" id="installdemo" value="1" />
                                安装初始化数据进行体验</strong>(体验数据将含带大部分功能的应用操作示例)</label></td>
                </tr>
            </table>

            <div class="btn-box">
                <input type="button"  value="后退" onclick="window.location.href='<?php echo $this->createUrl('install/step1'); ?>';" />
                <input type="submit" value="开始安装"  />
            </div>
        </div>
    </div>
    <div class="foot">
    </div>
</form>
</body>
</html>