<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-12-30
 * Time: 上午9:32
 * To change this template use File | Settings | File Templates.
 */

class Tbfunction {
    static public function add_goods($id)
    {
        echo  CHtml::link('Add',array('#','item_id'=>$id),array('class'=>'btn btn-primary'));
    }
    public function add_user($id)
    {
        echo  CHtml::link('Add',array('create','user_id'=>$id),array('class'=>'btn btn-primary'));
    }
}