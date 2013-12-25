<?php

class ElFinderConnectorAction extends CAction
{
    public $settings = array();

    public function run()
    {
        require_once dirname(__FILE__) . '/php/elFinderConnector.class.php';
        require_once dirname(__FILE__) . '/php/elFinder.class.php';
        require_once dirname(__FILE__) . '/php/elFinderVolumeDriver.class.php';
        require_once dirname(__FILE__) . '/php/elFinderVolumeLocalFileSystem.class.php';
        $connector = new elFinderConnector(new elFinder($this->settings));
        $connector->run();
    }
}
