<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WTopNav extends CWidget {

    public function getCount(){
        $cart = Yii::app()->cart;
        $count = $cart->total_items();
        return $count;
    }
    public function run() {
        $this->render('topNav');
    }

}