<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WLangBox extends CWidget {

    public function run()
    {
        $currentLang = Yii::app()->language;
        $this->render('lang_box', array('currentLang' => $currentLang));
    }

}