<?php
interface OAuthInterface{
	public function __construct($appkey,$appsecret);
	public function authorize();
	public function getToken();
	public function login($token);
}