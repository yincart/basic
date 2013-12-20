<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    public function actionStep1()
    {
        $insLockfile = dirname(__FILE__).'/install_lock.txt';


        if(file_exists($insLockfile))
        {
            exit("You had installed");
        }
        define('ROOT', dirname(__FILE__));


        @set_time_limit(0);
       //error_reporting(E_ALL);
        error_reporting(E_ALL || ~E_NOTICE);

        $phpv = phpversion();
        $sp_os = PHP_OS;
        $sp_gd =  function_exists("imagecreate");
        $sp_server = $_SERVER['SERVER_SOFTWARE'];
        $sp_host = (empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_HOST'] : $_SERVER['REMOTE_ADDR']);
        $sp_name = $_SERVER['SERVER_NAME'];
        $sp_max_execution_time = ini_get('max_execution_time');
        $sp_allow_reference = (ini_get('allow_call_time_pass_reference') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $sp_allow_url_fopen = (ini_get('allow_url_fopen') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $sp_safe_mode = (ini_get('safe_mode') ? '<font color=red>[×]On</font>' : '<font color=green>[√]Off</font>');
        $sp_gd = ($sp_gd>0 ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $sp_mysql = (function_exists('mysql_connect') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');

        if($sp_mysql=='<font color=red>[×]Off</font>')
            $sp_mysql_err = TRUE;
        else
            $sp_mysql_err = FALSE;

        $sp_testdirs = array(
            '/',
            'dirname(/)',
            '/css/*',
            '/model/*',
            '/view/*',
            '/configdata.php',

        );


        $this->render('step1',array('sp_name'=>$sp_name,
                            'sp_os'=>$sp_os,'phpv'=>$phpv,
                            'sp_server'=>$sp_server,
                            'sp_os'=>$sp_os,
                            'sp_host'=>$sp_host,
                            'sp_allow_url_fopen'=>$sp_allow_url_fopen,
                            'sp_allow_reference'=>$sp_allow_reference,
                            'sp_mysql_err'=>$sp_mysql_err,
                            'sp_testdirs'=>$sp_testdirs,
                            'sp_mysql'=>$sp_mysql,
                            'sp_gd'=>$sp_gd,
                            'sp_safe_mode'=>$sp_safe_mode));


    }
    public function actionStep2()
    {


        $s_lang = 'utf-8';
        if(!empty($_SERVER['REQUEST_URI']))
            $scriptName = $_SERVER['REQUEST_URI'];
        else
            $scriptName = $_SERVER['PHP_SELF'];

        $basepath = preg_replace("#\/install(.*)$#i", '', $scriptName);

        if(!empty($_SERVER['HTTP_HOST']))
            $baseurl = 'http://'.$_SERVER['HTTP_HOST'];
        else
            $baseurl = "http://".$_SERVER['SERVER_NAME'];


        $rnd_cookieEncode = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(1000,9999).chr(mt_rand(ord('A'),ord('Z')));
        $isdemosign = 0;

            $model=new ConfigdataForm;


        // collect user input data
        if(isset($_POST['ConfigdataForm']))
        {
            $model->attributes=$_POST['ConfigdataForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() )
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('step2',array('model'=>$model,
                                    's_lang'=>$s_lang,
                                    'rnd_cookieEncode'=>$rnd_cookieEncode,
                                    'baseurl'=>$baseurl,
                                    'basepath'=>$basepath,
                                    'isdemosign'=>$isdemosign,));

    }
    public function actionStep3()
    {
        $config_data_form = new ConfigdataForm();
        $config_data_form->attributes = $_POST['ConfigdataForm'];
        $config_data_form->validate();
        $conn = mysql_connect($_POST['ConfigdataForm']['dbhost'],$_POST['ConfigdataForm']['dbuser'],$_POST['ConfigdataForm']['dbpwd']) or die("<script>alert('数据库服务器或登录密码无效，\\n\\n无法连接数据库，请重新设定！');history.go(-1);</script>");
        //var_dump($_POST['ConfigdataForm']);
      //  var_dump($config_data_form) ;
       // var_dump($_POST['ConfigdataForm']['dbhost']);
        mysql_query("CREATE DATABASE IF NOT EXISTS `".$_POST['ConfigdataForm']['dbname']."`;",$conn);
        mysql_select_db($_POST['ConfigdataForm']['dbname']) or die("<script>alert('选择数据库失败，可能是你没权限，请预先创建一个数据库！');history.go(-1);</script>");

        //获得数据库版本信息
        $rs = mysql_query("SELECT VERSION();",$conn);
        $row = mysql_fetch_array($rs);
        $mysqlVersions = explode('.',trim($row[0]));
        $mysqlVersion = $mysqlVersions[0].".".$mysqlVersions[1];

        $fp = fopen(dirname(__FILE__)."/configdata.php","r");
        $configStr1 = fread($fp,filesize(dirname(__FILE__)."/configdata.php"));
        fclose($fp);


        //common.inc.php
        $configStr1 = str_replace("~dbhost~",$_POST['ConfigdataForm']['dbhost'],$configStr1);
        $configStr1 = str_replace("~dbname~",$_POST['ConfigdataForm']['dbname'],$configStr1);
        $configStr1 = str_replace("~dbuser~",$_POST['ConfigdataForm']['dbuser'],$configStr1);
        $configStr1 = str_replace("~dbpwd~",$_POST['ConfigdataForm']['dbpwd'],$configStr1);
        $configStr1 = str_replace("~dbprefix~",$_POST['ConfigdataForm']['dbprefix'],$configStr1);
        $configStr1 = str_replace("~dblang~",$_POST['ConfigdataForm']['dblang'],$configStr1);
        $configStr1 = str_replace("~baseurl~",$_POST['ConfigdataForm']['baseurl'],$configStr1);
        $configStr1 = str_replace("~indexurl~",$_POST['ConfigdataForm']['indexurl'],$configStr1);
        $configStr1 = str_replace("~webname~",$_POST['ConfigdataForm']['webname'],$configStr1);
        $configStr1 = str_replace("~adminmail~",$_POST['ConfigdataForm']['adminmail'],$configStr1);

        $fp = fopen(dirname(__FILE__)."/configdata.php","w") or die("<script>alert('cont open file' );history.go(-1);</script>");
        fwrite($fp,$configStr1);
        fclose($fp);



        if($mysqlVersion >= 41111.1)
        {
            $sql4tmp = "ENGINE=MyISAM DEFAULT CHARSET=".$_POST['ConfigdataForm']['dblang'];
        }



        $query = '';
        $fp = fopen(dirname(__FILE__).'/sqltable.txt','r');
        while(!feof($fp))
        {
            $line = rtrim(fgets($fp,1024));
            if(preg_match("#;$#", $line))
            {
                $query .= $line."\n";
                $query = str_replace('#@__',$_POST['ConfigdataForm']['dbprefix'],$query);
                if($mysqlVersion < 4.1)
                {
                    $rs = mysql_query($query,$conn);
                } else {
                    if(preg_match('#CREATE#i', $query))
                    {
                        $rs = mysql_query(preg_replace("#TYPE=MyISAM#i",$sql4tmp,$query),$conn);
                    }
                    else
                    {
                        $rs = mysql_query($query,$conn);
                    }
                }
                $query='';
            } else if(!preg_match("#^(\/\/|--)#", $line))
            {
                $query .= $line;
            }
        }
        fclose($fp);
       /*
        //导入默认数据
        $query = '';
        $fp = fopen(dirname(__FILE__).'/sql-dfdata.txt','r');
        while(!feof($fp))
        {
            $line = rtrim(fgets($fp, 1024));
            if(preg_match("#;$#", $line))
            {
                $query .= $line;
                $query = str_replace('#@__',$dbprefix,$query);
                if($mysqlVersion < 4.1) $rs = mysql_query($query,$conn);
                else $rs = mysql_query(str_replace('#~lang~#',$dblang,$query),$conn);
                $query='';
            } else if(!preg_match("#^(\/\/|--)#", $line))
            {
                $query .= $line;
            }
        }
        fclose($fp);

        //增加管理员帐号
        $adminquery = "INSERT INTO `{$dbprefix}admin` VALUES (1, 10, '$adminuser', '".substr(md5($adminpwd),5,20)."', 'admin', '', '', 0, '".time()."', '127.0.0.1');";
        mysql_query($adminquery,$conn);
        */



            //锁定安装程序
        $insLockfile = dirname(__FILE__).'/install_lock.txt';
        $fp = fopen($insLockfile,'w');
        fwrite($fp,'You have install ok!');
        fclose($fp);


        $this->render('step3');


    }

}