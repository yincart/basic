<?php
class admincp extends PluginAdmin{

	public $media = array('qq','weibo');
	public $enable = array();
	public $input;

	public function run(){
		if($_POST){
			$this->enable = array_intersect($_POST['media'] ? $_POST['media'] : array(),$this->media);
			$this->setSetting('enable',serialize($this->enable));
		}
		$enable = $this->getSetting('enable');
		$this->enable = $enable ? unserialize($enable) : array();

		$this->qq();
		$this->weibo();

		$this->render('admincp',array(
			'enable'=>$this->enable,
			'input'=>$this->input
			));
	}

	protected function qq(){

		if($_POST && in_array('qq',$this->enable)){
			$this->setSetting('QQAuth_appkey',$_POST['QQAuth_appkey']);
			$this->setSetting('QQAuth_appsecret',$_POST['QQAuth_appsecret']);
		}

		$this->input['QQAuth_appkey'] = $this->getSetting('QQAuth_appkey');
		$this->input['QQAuth_appsecret'] = $this->getSetting('QQAuth_appsecret');
	}

	protected function weibo(){

		if($_POST && in_array('weibo',$this->enable)){
			$this->setSetting('SinaAuth_appkey',$_POST['SinaAuth_appkey']);
			$this->setSetting('SinaAuth_appsecret',$_POST['SinaAuth_appsecret']);
		}

		$this->input['SinaAuth_appkey'] = $this->getSetting('SinaAuth_appkey');
		$this->input['SinaAuth_appsecret'] = $this->getSetting('SinaAuth_appsecret');
	}
}