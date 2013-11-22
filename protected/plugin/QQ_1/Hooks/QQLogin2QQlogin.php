<?php

/**
 * website QQLogin2Hook
 *
 * @author  Jiankang.Wang
 * @Date:   2013-9-24
 * @Time:   1:51:34 PM
 */
class QQLogin2QQlogin extends PluginHook {

	public function run() {
		$public = $this->PublishAssets('/public');
		$this->render('test',array('public'=>$public));
	}

}

?>
