<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WFootMenu extends CWidget {

    public function getFootMenu() {
        $foot = Menu::model()->findByPk(5);
        $descendants = $foot->children()->findAll();
        return $descendants;
    }

    public function run() {
        $this->render('footMenu');
    }

}