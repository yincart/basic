<?php

class DefaultController extends MallBaseController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}