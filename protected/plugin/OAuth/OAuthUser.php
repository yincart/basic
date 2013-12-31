<?php
/**
 * 用户隐射管理类
 * <修改此类>
 * 按关联规则返回openid对应的用户id,用户名,用户资料
 */
class OAuthUser {

	/**
	 * 用户id
	 * @var string
	 */
	protected $id;
	/**
	 * 用户名
	 * @var string
	 */
	protected $username;
	/**
	 * 第三方媒体openid
	 * @var string
	 */
	protected $openid;
	/**
	 * 第三方媒体用户资料
	 * @var array
	 */
	protected $userinfo;

	/**
	 * 第三方媒体用户头像
	 * @var string
	 */
	protected $avatar;


	/**
	 * 构造函数
	 * @param string $authType 认证媒体类型
	 * @param string $openid   媒体的openid
	 */
	public function __construct($authType,$openid){
		$this->openid = $openid;

		// 默认
		$this->id = $authType .'_'.$openid;
	}

	public function __get($name){
		$getter = 'get' . $name;
		if (method_exists($this, $getter))
			return $this->$getter();
		return FALSE;
	}

	public function setinfo($info){
		$this->userinfo = $info;
	}
	public function getId(){
		return $this->id;
	}
	public function getUsername(){
		return $this->userinfo['username'];
	}

	public function getAvatar(){
		return $this->userinfo['avatar'];
	}
}