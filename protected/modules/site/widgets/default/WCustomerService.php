<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class WCustomerService extends CWidget
{
    public function run()
    {
        $cri = new CDbCriteria(array(
            'condition'=>'is_show = 1',
            'order'=>'sort_order asc, id desc'
        ));
        $CustomerService = CustomerService::model()->findAll($cri);
        $this->render('customerService', array(
            'CustomerService'=>$CustomerService
        ));
    }
}
?>
