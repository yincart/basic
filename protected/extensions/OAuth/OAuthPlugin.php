<?php
require_once('OAuthInterface.php');
require_once('OAuthBase.php');
require_once('OAuthUser.php');

class OAuthPlugin extends Plugin {

	public $media;

	public function init(){
		$this->identify = 'OAuth';
		$this->name = '第三方登录';
		$this->version = '1.0';
		$this->copyright = '© Robin <healthlolicon@gmail.com>';
		$this->website = '#';
		$this->description = '提供基于OAuth2规范的第三方登录接口';
		$this->icon = 'OAuth2.png';
	}

	public function Hooks(){
		return array(
			'Hook_Login'=>'showMedia'
			);
	}

	public function setAdminCp(){
		return 'admincp';
	}

	##############  Hooks  ##############
	public function showMedia(){
		$enable = unserialize($this->getSetting('enable'));
		if(empty($enable))
			return;
		$this->render('showMedia',array(
			'enable'=>$enable,
			'imgDir'=>$this->PublishAssets('/img',false)
			)
		);
	}

	##############  Actions  ############
	public function actionLogin(){
		$this->loadMedia();
		$this->setCookie('oauth_referer',Yii::app()->request->urlReferrer);
		$this->redirect($this->media->authorize());
	}

	public function actionCallback(){
		$this->loadMedia();
		$token = $this->media->getToken();

		if(!$token){
			throw new CHttpException(400,$this->media->error);
			return;
		}
		if($this->media->login($token)){
			$referer = $this->getCookie('oauth_referer') ? $this->getCookie('oauth_referer') : Yii::app()->homeUrl;
			$this->delCookie('oauth_referer');
			$this->redirect($referer);
		}
	}

	#####################################
	protected function loadMedia(){
		if(!$_GET['type']){
			throw new CHttpException(404);
		}
		$enable = unserialize($this->getSetting('enable'));
		switch (strtolower($_GET['type'])) {
			case 'qq':
			if(in_array('qq', $enable))
				$class = 'QQAuth';
			break;

			case 'weibo':
			if(in_array('weibo', $enable))
				$class = 'SinaAuth';
			break;
		}
		if(!$class){
			throw new CHttpException(404);
		}
		require_once($this->pluginDir.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.$class.'.php');
		if(!class_exists($class)){
			throw new CHttpException(404);
		}
		$this->media = new $class($this->getSetting($class.'_appkey'),$this->getSetting($class.'_appsecret'));
		$this->media->plugin = $this;
	}
}