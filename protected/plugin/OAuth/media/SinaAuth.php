<?php
class SinaAuth extends OAuthBase implements OAuthInterface {

	public $openid;

	public function login($token){
		$this->token = $token;
		$userinfo = $this->getUserInfo();

		$userinfo['username'] = $userinfo['screen_name'];
		$userinfo['avatar'] = $userinfo['profile_image_url'];
		$user = new OAuthUser('weibo',$this->openid);
		$user->setinfo($userinfo);
		$this->setUser($user);
		return true;
	}

	public function authorize(){
		$url = 'https://api.weibo.com/oauth2/authorize';
		$hash = hash('crc32',time());
		$params = array(
			'response_type' => 'code',
			'client_id' => $this->appkey,
			'redirect_uri' => $this->plugin->createUrl('callback',array('type'=>'weibo'),true),
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

		$url = 'https://api.weibo.com/oauth2/access_token';
		$params = array(
			'grant_type' => 'authorization_code',
			'client_id' => $this->appkey,
			'client_secret' => $this->appsecret,
			'code' => $_GET['code'],
			'redirect_uri' => $this->plugin->createUrl('callback',array('type'=>'weibo'),true),
			);

		$r = $this->curlPost($url,$params);
		if(!$r)
			return false;

		$data = json_decode($r,true);
		if(isset($data['error'])){
			$this->error =$data['error_description'] ?  $data['error_description'] : $data['error'];
			return false;
		}

		$this->openid = $data['uid'];
		return $data['access_token'];
	}

	protected function getUserInfo(){
		$url = 'https://api.weibo.com/2/users/show.json';
		$params = array(
			'access_token' => $this->token,
			'uid' => $this->openid,
			);
		$r = $this->curlGet($url,$params);
		if(!$r)
			return false;
		$data = json_decode($r,true);
		if($data['error']){
			$this->error = 'get user info failed';

			return false;
		}
		return $data;
	}
}
