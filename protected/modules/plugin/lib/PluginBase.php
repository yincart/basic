<?php

/**
 * Yii-Plugin module
 * 
 * @author Viking Robin <healthlolicon@gmail.com> 
 * @link https://github.com/health901/yii-plugin
 * @license https://github.com/health901/yii-plugins/blob/master/LICENSE
 * @version 1.0
 */
class PluginBase extends CBaseController {

	public $pluginDir;
	public $viewDir = 'views';
	public $i18n;

	public function __construct() {
		if (method_exists($this, 'init'))
			$this->init();
	}

	public function __get($name) {
		$getter = 'get' . $name;
		if (method_exists($this, $getter))
			return $this->$getter();
		return FALSE;
	}

	/**
	 * translate a string
	 * see http://www.yiiframework.com/doc/api/1.1/YiiBase#t-detail for detail
	 * @param string $category source filename
	 * @param string $message  the original message
	 * @param array  $params   parameters to be applied to the message
	 * @param string $language the target language
	 * @return string translated the translated message
	 */
	public function T($category, $message, $params = array(), $language = NULL) {
		$category = $this->identify . 'Plugin.' . $category;
		return Yii::t($category, $message, $params, NULL, $language);
	}

	/**
	 * Publishes a file or a directory.
	 * This method will copy the specified asset to a web accessible directory and return the URL for accessing the published asset. 
	 * @param string $path the asset (file or directory) to be published
	 * @return string an absolute URL to the published asset
	 */
	public function PublishAssets($path, $absolute = true) {
		if (substr($path, 0, 1) != '/') {
			$path = DIRECTORY_SEPARATOR . $path;
		}
		$path = $this->pluginDir . $path;
		$protocol = $_SERVER['HTTPS'] ? $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://'  : 'http://';
		return $absolute ? $protocol . $_SERVER['HTTP_HOST'] . Yii::app()->getAssetManager()->publish($path) : Yii::app()->getAssetManager()->publish($path);
	}

	/**
	 * get coustom plugin setting
	 * @param  string $key setting key
	 * @return string      setting value
	 */
	public function getSetting($key) {
		return PluginsSetting::model()->get($this->identify, $key);
	}

	/**
	 * set coustom plugin setting
	 * @param string $key setting key
	 * @param string $value setting value
	 * @return boolean
	 */
	public function setSetting($key, $value = NULL) {
		return PluginsSetting::model()->set($this->identify, $key, $value);
	}

	/**
	 * render a view 
	 * @param  string 	$view   name of the view to be rendered, the root is <PluginDir>/<viewDir>
	 * @param  array 	$data   data to be extracted into PHP variables and made available to the view script
	 * @param  boolean 	$return whether the rendering result should be returned instead of being displayed to end users.
	 * @return string          the rendering result. Null if the rendering result is not required.
	 */
	public function render($view, $data = NULL, $return = FALSE) {
		if (!$view)
			return FALSE;
		if (($viewFile = $this->getViewFile($view)) !== FALSE) {
			return $this->renderFile($viewFile, $data, $return);
		}
	}

	/**
	 * Creates a URL for the specified action defined in plugin.
	 * @param  string  $action   plugin action name of this url
	 * @param  array   $params   additional GET parameters (name=>value). Both the name and value will be URL-encoded. If the name is '#', the corresponding value will be treated as an anchor and will be appended at the end of the URL.
	 * @param  boolean $absolute is a absolute url or a relative url
	 * @return string            the constructed URL
	 */
	public function createUrl($action = NULL, $params = array(), $absolute = false) {
        if(Yii::app()->request->enableCsrfValidation){
            array_merge($params,array(Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken));
        }
		if($action){
			$url = Yii::app()->createUrl('/plugin/plugin/index', array_merge($params, array('id' => $this->identify, 'action' => $action)));
		}else{
			$url = Yii::app()->createUrl('/plugin/plugin/index', array_merge($params, array('id' => $this->identify)));
		}
		if ($absolute) {
			$protocol = $_SERVER['HTTPS'] ? $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://'  : 'http://';
			$url = $protocol . $_SERVER['HTTP_HOST'] . $url;
		}
		return $url;
	}

	/**
	 * Creates a relative URL for the specified action defined in system controllers (outside of plugin).
	 * @param  string $route     the URL route. This should be in the format of 'ControllerID/ActionID'. If the ControllerID is not present, the current controller ID will be prefixed to the route. If the route is empty, it is assumed to be the current action. If the controller belongs to a module, the module ID will be prefixed to the route. (If you do not want the module ID prefix, the route should start with a slash '/'.)
	 * @param  array  $params    additional GET parameters (name=>value). Both the name and value will be URL-encoded. If the name is '#', the corresponding value will be treated as an anchor and will be appended at the end of the URL.
	 * @param  string $ampersand the token separating name-value pairs in the URL.
	 * @return string            the constructed URL
	 */
	public function createSystemUrl($route, $params = array(), $ampersand = '&') {
		return Yii::app()->createUrl($route, $params, $ampersand);
	}

	/**
	 * Redirects the browser to the specified URL
	 * @param  string $url the URL to be redirected to
	 */
	public function redirect($url) {
		$url = $url ? $url : $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		exit;
	}

	### Cookie
	/**
	 * setCookie
	 * @param string $key    cookie identify
	 * @param mixed $value   value of cookie
	 * @param array  $option cookie options, array(option=>value),  such as 'expire','httpOnly','domain'. 
	 */

	public function setCookie($key, $value = NULL, $option = array()) {
		$options = array('expire', 'httpOnly', 'path', 'secure', 'domain');
		$cookie = new CHttpCookie($key, $value);
		foreach ($options as $opt) {
			if (isset($option[$opt])) {
				$cookie->$opt = $option[$opt];
			}
		}
		Yii::app()->request->cookies[$key] = $cookie;
	}

	/**
	 * get a cookie
	 * @param  string $key cookie identify
	 * @return mixed     value of cookie
	 */
	public function getCookie($key) {
		return Yii::app()->request->cookies[$key];
	}

	/**
	 * remove a cookie
	 * @param  string $key cookie identify
	 */
	public function delCookie($key) {
		unset(Yii::app()->request->cookies[$key]);
	}

	/**
	 * get all cookies
	 * @return array cookies
	 */
	public function getCookies() {
		foreach (Yii::app()->request->cookies as $cookie) {
			$cookies[$cookie->name] = $cookie->value;
		}
		return $cookies;
	}

	/**
	 * clear cookies
	 */
	public function clearCookies() {
		Yii::app()->request->cookies->clear();
	}

	### Cache
	/**
	 * store the value with a key into cache 
	 * @param string  $key    a key identifying the cached value
	 * @param mixed  $value  cache value
	 * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return true if the value is successfully stored into cache, false otherwise
	 */

	public function setCache($key, $value, $expire = 0) {
		return Yii::app()->cache->set($key, $value, $expire);
	}

	/**
	 * Retrieves a value from cache with a specified key.
	 * @param  string $key a key identifying the cached value
	 * @return mixed      the value stored in cache, false if the value is not in the cache, expired or the dependency has changed.
	 */
	public function getCache($key) {
		return Yii::app()->cache->get($key);
	}

	/**
	 * Deletes a value with the specified key from cache
	 * @param  string $key the key of the value to be deleted
	 * @return boolean      if no error happens during deletion
	 */
	public function delCache($key) {
		return Yii::app()->cache->delete($key);
	}

	/**
	 * Deletes all values from cache. Be careful of performing this operation if the cache is shared by multiple applications.
	 * @return boolean whether the flush operation was successful.
	 */
	public function clearCache() {
		return Yii::app()->cache->flush();
	}

	### Session
	/**
	 * Adds a session variable. Note, if the specified name already exists, the old value will be removed first.
	 * @param string $key   session variable name
	 * @param mixed $value  session variable value 
	 */

	public function setSession($key, $value) {
		Yii::app()->session->add($key, $value);
	}

	/**
	 * Returns the session variable value with the session variable name.
	 * @param  string $key   session variable name
	 * @return mixed    session variable value 
	 */
	public function getSession($key) {
		return Yii::app()->session->get($key);
	}

	/**
	 * Removes a session variable.
	 * @param  string $key   session variable name
	 * @return mixed 	the removed value, null if no such session variable. 
	 */
	public function delSession($key) {
		return Yii::app()->session->remove($key);
	}

	/**
	 * Frees all session variables and destroys all data registered to a session.
	 */
	public function clearSession() {
		Yii::app()->session->destroy();
	}

	##################################################

	public function getViewFile($viewName) {
		$ext = '.php';
		if (strpos($viewName, '.'))
			$viewName = str_replace('.', '/', $viewName);
		$root = $this->viewDir ? $this->pluginDir . DIRECTORY_SEPARATOR . $this->viewDir : $this->pluginDir;
		if ($this->i18n == 'path') {
			$root = $root . DIRECTORY_SEPARATOR . Yii::app()->getLanguage();
		}
		$viewFile = $root . DIRECTORY_SEPARATOR . $viewName . $ext;

		if (is_file($viewFile)) {
			return $viewFile;
		}
		return FALSE;
	}

}