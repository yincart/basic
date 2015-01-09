<?php

Yii::import('zii.widgets.CPortlet');

class WRecentComments extends CPortlet
{
	public $title='';
	public $maxComments=10;

	public function getRecentComments()
	{
		return Comment::model()->findRecentComments($this->maxComments);
	}

	protected function renderContent()
	{
		$this->render('recentComments');
	}
}