<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WSidebarHelpCenter extends CWidget {
    
    public function getHelp()
    {
        $category=Category::model()->findByPk(13);
        $help=$category->children()->findAll();
        return $help;
    }
    public function run() {
        $this->render('sidebarHelpCenter');
    }

}