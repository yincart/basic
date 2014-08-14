<?php
/**
 * Created by PhpStorm.
 * User: changhai.lin
 * Date: 4/28/14
 * Time: 8:57 AM
 */
?>
<li>
    <?php echo CHtml::radioButton('delivery_address',true,array('value' => $model->contact_id,'id' => 'delivery_address'.$model->contact_id));?>
    <?php echo CHtml::tag('span', array(
            'class' => 'buyer-address shop_selection'),
        $model->s->name . '&nbsp;' . $model->c->name . '&nbsp;' . $model->d->name . '&nbsp;' . $model->address . '&nbsp;(' . $model->contact_name . '&nbsp;收)&nbsp;' . $model->mobile_phone);?>
</li>