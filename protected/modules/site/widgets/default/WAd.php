<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class WAd extends CWidget
{
    public function getAds()
    {
        $cri = new CDbCriteria(array(
                    'condition' => 'theme LIKE "%default%"', 
                    'order' => 'sort_order asc',
                ));
        $ads = Ad::model()->findAll($cri);
        return $ads;
    }
    
    public function run()
    {
        $this->render('ad');
    }
}