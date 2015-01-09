<?php

Yii::import('zii.widgets.CPortlet');

class WUserMenu extends CPortlet
{
	public function init()
	{
		$this->title='欢迎您，'.CHtml::encode(Yii::app()->user->name);
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('userMenu');
	}
}