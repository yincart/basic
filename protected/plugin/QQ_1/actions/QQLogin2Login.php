<?php
class QQLogin2Login extends PluginAction{
	public function run() {
		$public = $this->PublishAssets('/public');
		$this->render('test',array('public'=>$public));
	}
}

?>
