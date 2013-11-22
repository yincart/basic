<?php

class PluginBase extends CBaseController {

	public $pluginDir;
	public $viewDir = 'views';
	public $i18n;

	public function __get($name) {
		$getter = 'get' . $name;
		if (method_exists($this, $getter))
			return $this->$getter();
	}

	public function T($category, $message, $params = array(), $language = NULL) {
		$category = $this->identify . 'Plugin.' . $category;
		return Yii::t($category, $message, $params, $source, $language);
	}

	public function PublishAssets($path) {
		if (substr($path, 0, 1) != '/') {
			$path = DIRECTORY_SEPARATOR . $path;
		}
		$path = $this->pluginDir . $path;
		return '//' . $_SERVER['HTTP_HOST'] . Yii::app()->getAssetManager()->publish($path);
	}

	public function render($view, $data = null, $return = false) {
		if (($viewFile = $this->getViewFile($view)) !== false) {
			return $this->renderFile($viewFile, $data, $return);
		}
	}

	public function getViewFile($viewName) {
		$ext = '.php';
		if (strpos($viewName, '.'))
			$viewName = str_replace('.', '/', $viewName);
		$root = $this->pluginDir . DIRECTORY_SEPARATOR . $this->viewDir;
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

?>
