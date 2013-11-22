<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WFriendLink extends CWidget {
    
    public function getLink()
    {
        $cri = new CDbCriteria(array(
                    'order' => 'sort_order asc',
                    'limit' => '7'
                ));
        $friendlink = FriendLink::model()->findAll($cri);
        return $friendlink;
    }
    
    public function run() {
        $this->render('friendLink');
    }

}