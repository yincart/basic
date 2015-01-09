<?php
class OAuthBase {

	public $error;
	public $plugin;

	public $appkey;
	public $appsecret;
	public $token;

	public function __construct($appkey,$appsecret){
		$this->appkey = $appkey;
		$this->appsecret = $appsecret;
	}
	public function setUser($user){
		Yii::app()->user->setId($user->id);
		Yii::app()->user->setName($user->username);
	}

	public function curlGet($url,$params = array(),$method = 'get',$option = array()){

		if(!empty($params)){
			$p = http_build_query($params);
			$url = $url . '?' . $p;
		}
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt_array($ch,$option);

		$result = curl_exec($ch);
		if(!$result){
			$this->error = curl_error($ch);
		}
		curl_close($ch);

		return $result ? $result : false;
	}

	public function curlPost($url,$params = array(),$method = 'get',$option = array()){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		if(!empty($params)){
			$p_string  = http_build_query($params);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $p_string);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt_array($ch,$option);

		$result = curl_exec($ch);
		if(!$result){
			$this->error = curl_error($ch);
		}
		curl_close($ch);

		return $result ? $result : false;
	}
}