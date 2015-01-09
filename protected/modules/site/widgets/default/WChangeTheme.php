<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class WChangeTheme extends CWidget
{
    public function run()
    {
       $currentTheme = Yii::app()->theme->name;
       $this->render('changeTheme', array(
           'currentTheme' =>$currentTheme,
           ));
    }
}
?>
