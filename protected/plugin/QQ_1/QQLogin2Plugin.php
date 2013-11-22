<?php

/**
 * website QQPlugin
 *
 * @author  Jiankang.Wang
 * @Date:   2013-9-24
 * @Time:   1:35:48 PM
 */
class QQLogin2Plugin extends Plugin {

	public $key = '';
	public $i18n = 'path';

	public function __construct() {
		$this->pluginDir = dirname(__FILE__);
		$this->identify = 'QQLogin2';
		$this->version = '1.0';
		$this->copyright = 'Robin';
		$this->website = 'xxx';
		$this->description = '1235';
		$this->name = 'QQ登陆';
	}

	public function Hooks() {
		return array(
			'Hook_Login_Form_0' => 'QQlogin',
			'Hook_Login_Form' => 'Hooks.QQlogin',
		);
	}

	public function Actions() {
		return array(
			'login2' => 'Login'
		);
	}

	public function setAdminCp() {
		return 'admincp';
	}

//	public function AdminCp(){
//		echo '134';
//	}
	public function QQlogin() {
		echo 'qqlogin';
	}

	//Actions
	public function actionLogin() {
		echo 'ok';
	}

}

?>
