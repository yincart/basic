<?php
class QQAuth extends OAuthBase implements OAuthInterface {

	public $openid;

	public function login($token){
		$this->token = $token;
		if(!$this->getOpenId()){
			return false;
		}
		$userinfo = $this->getUserInfo();
		$userinfo['username'] = $userinfo['nickname'];
		$userinfo['avatar'] = $userinfo['figureurl_qq_1'];
		$user = new OAuthUser('qq',$this->openid);
		$user->setinfo($userinfo);
		$this->setUser($user);
		return true;
	}

	public function authorize(){
		$url = 'https://graph.qq.com/oauth2.0/authorize';
		$hash = hash('crc32',time());
		$params = array(
			'response_type' => 'code',
			'client_id' => $this->appkey,
			'redirect_uri' => $this->plugin->createUrl('callback',array('type'=>'qq'),true),
			'state' => $hash.'_'.md5($hash.$this->appsecret),
			);
		return $url.'?'.http_build_query($params);
	}
	
	public function getToken(){
		if(!$_GET['state']){
			return false;
		}
		$s = explode('_', $_GET['state']);
		if(md5($s[0].$this->appsecret) != $s[1]){
			return false;
		}

		$url = 'https://graph.qq.com/oauth2.0/token';
		$params = array(
			'grant_type' => 'authorization_code',
			'client_id' => $this->appkey,
			'client_secret' => $this->appsecret,
			'code' => $_GET['code'],
			'redirect_uri' => $this->plugin->createUrl('callback',array('type'=>'qq'),true),
			);
		$r = $this->curlGet($url,$params);
		if(!$r)
			return false;

		if(preg_match('/(?<=callback\()(.+)(?=\);)/', $r,$jdata)){
			$data = json_decode($jdata[0],true);
			if(isset($data['error'])){
				$this->error = $data['error_description'];
				return false;
			}
		}else{
			parse_str($r,$data);
			return $data['access_token'];
		}	
	}

	protected function getOpenId(){
		$url = 'https://graph.qq.com/oauth2.0/me';

		$r = $this->curlGet($url,array('access_token'=>$this->token));

		if(!$r)
			return false;

		if(preg_match('/(?<=callback\()(.+)(?=\);)/', $r,$jdata)){
			$data = json_decode($jdata[0],true);
			if(isset($data['error'])){
				$this->error = $data['error_description'];
				return false;
			}
			$this->openid = $data['openid'];
			return $data['openid'];
		}else{
			return false;
		}
	}

	protected function getUserInfo(){
		$url = 'https://graph.qq.com/user/get_user_info';
		$params = array(
			'access_token' => $this->token,
			'oauth_consumer_key' => $this->appkey,
			'openid' => $this->openid,
			'format' => 'json',
			);
		$r = $this->curlGet($url,$params);
		if(!$r)
			return false;
		$data = json_decode($r,true);
		if($data['ret']){
			$this->error = 'get user info failed';

			return false;
		}
		return $data;
	}
}
