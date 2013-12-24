<?php

class ElFinderConnectorAction extends CAction
{
    /**
     * @var array
     */
    public $settings = array();

    public function run()
    {
        require_once(dirname(__FILE__) . '/php/elFinder.class.php');
        $fm = new elFinder($this->settings);
        $fm->run();

    }
}
