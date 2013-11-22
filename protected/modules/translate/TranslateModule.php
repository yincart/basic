<?php

class TranslateModule extends CWebModule {

	/**
	 * TranslateModule::init()
	 * 
	 * @return
	 */
	public function init()
	{
		$this->defaultController = 'Translate';
		$this->setImport(array(
			'translate.models.*',
			'translate.controllers.*',
			'translate.components.*',
			'translate.widgets.*'
		));
		return parent::init();
	}

}