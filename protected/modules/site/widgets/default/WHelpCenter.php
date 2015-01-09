<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WHelpCenter extends CWidget {

    public function getHelp() {
        $help = Category::model()->findByPk(13);
        $descendants = $help->children()->findAll();
        return $descendants;
    }

    public function run() {
        $this->render('helpCenter');
    }

}