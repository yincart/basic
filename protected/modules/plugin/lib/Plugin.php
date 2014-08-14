<?php

/**
 * Yii-Plugin module
 * 
 * @author Viking Robin <healthlolicon@gmail.com> 
 * @link https://github.com/health901/yii-plugin
 * @license https://github.com/health901/yii-plugins/blob/master/LICENSE
 * @version 1.0
 */
abstract class Plugin extends PluginBase {

	private $info = array(
		'identify' => '',
		'version' => '',
		'copyright' => '',
		'website' => '',
		'description' => '',
		'name' => '',
		'icon' => '',
	);

	public function __construct() {
		parent::__construct();
		$class = get_class($this);
		$reflection = new ReflectionClass($class);
		$this->pluginDir = dirname($reflection->getFileName());
	}

	/**
	 * *************************************************
	 *  methods below can be overridden or implemented
	 * *************************************************
	 */

	/**
	 * initialize plugin, set plugin infos
	 */
	abstract public function init();

	/**
	 * return an array of hooks,all plugins have to implement this method.
	 * @return array Hooks list
	 */
	abstract public function Hooks();

	/**
	 * adv usage
	 * return an array of Actions's class name
	 * @return array Actions list
	 */
	public function Actions() {
		return FALSE;
	}

	/**
	 * adv usage
	 * return admincp file's name
	 * @return string admincp 
	 */
	public function setAdminCp() {
		return FALSE;
	}

	/**
	 * install plugin
	 * this method will called automatic when "Install" clicked.
	 * inherit this method to do more things such as execute a sql statement
	 * MUST TETURN TRUE
	 * @return boolean
	 */
	public function Install() {
		return TRUE;
	}

	/**
	 * uninstall plugin
	 * this method will called automatic when "Uninstall" clicked.
	 * inherit this method to do more things such as execute a sql statement
	 * MUST TETURN TRUE
	 * @return boolean
	 */
	public function Uninstall() {
		return TRUE;
	}

	/**
	 * *************************************************
	 *  methods below can be used in plugins
	 * *************************************************
	 */

	/**
	 * execute a sql statement
	 * prefix in sql will be replace to the project's prefix
	 * @param string $sql    sql statement
	 * @param string $prefix prefix in sql statement
	 * @return boolean
	 */
	protected function Query($sql, $prefix = 'tbl_') {
		$db = Yii::app()->db;
		$tablePrefix = $db->tablePrefix;
		if ($tablePrefix != $prefix)
			$sql = str_replace($prefix, $tablePrefix, $sql);
		$transaction = $db->beginTransaction();
		try {
			$db->createCommand($sql)->execute();
			$transaction->commit();
		} catch (Exception $e) {
			$transaction->rollback();
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * ****************************************
	 *   Internal methods
	 * **************************************** 
	 */
	public function Icon() {
		if (!$this->icon) {
			return FALSE;
		}
		return Yii::app()->getAssetManager()->publish($this->pluginDir . DIRECTORY_SEPARATOR . $this->icon);
	}

	public function LoadHook($string) {
		$hk = explode('.', $string);
		if (!$hk[1])
			return FALSE;
		include_once($this->pluginDir . DIRECTORY_SEPARATOR . $hk[0] . DIRECTORY_SEPARATOR . $this->identify . $hk[1] . '.php');
		$class = $this->identify . $hk[1];
		if (!class_exists($class)) {
			return FALSE;
		}
		$hook = new $class();
		$hook->Owner($this);
		return $hook;
	}

	public function clear() {
		PluginsSetting::model()->clear($this->identify);
		return TRUE;
	}

	public function __get($name) {
		$value = parent::__get($name);
		if ($value !== FALSE)
			return $value;
		if (isset($this->info[$name])) {
			return htmlspecialchars($this->info[$name]);
		}
	}

	public function __set($name, $value) {
		$setter = 'set' . $name;
		if (method_exists($this, $setter)) {
			return $this->$setter($name, $value);
		} elseif (isset($this->info[$name])) {
			$this->info[$name] = $value;
		} else {
			return FALSE;
		}
	}

}

