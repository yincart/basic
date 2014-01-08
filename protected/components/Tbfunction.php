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
        echo  CHtml::link('<div class="btn btn-primary">Add</div>',array('create','item_id'=>$id));
    }
    public function add_user($id)
    {
        echo  CHtml::link('<div class="btn btn-primary">Add</div>',array('create','user_id'=>$id));
    }
    public function view_user($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }
    public function state($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

}