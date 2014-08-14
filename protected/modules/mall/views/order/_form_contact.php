<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14-1-13
 * Time: 下午2:05
 * To change this template use File | Settings | File Templates.
 */
?>
<div style="float:left"> 联系方式：</div>

<div style="clear:left"></div>
<div class="input-group space">
    <?php echo $form->labelEx($model, 'receiver_name', array('class' => 'input-group-addon')); ?>
    <?php echo $form->textField($model, 'receiver_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
</div>
<div class="input-group space">
    <?php
    $state_data = Area::model()->findAll("grade=:grade",
        array(":grade" => 1));
    $state = CHtml::listData($state_data, "area_id", "name");
    $s_default = $model->isNewRecord ? '' : $model->receiver_state;
    echo $form->labelEx($model, 'receiver_state', array('class' => 'input-group-addon'));
    echo CHtml::dropDownList('Order[receiver_state]', $s_default, $state,
        array(
            'class' => 'form-control form-control1',
                'empty' => '请选择省份',
            'ajax' => array(
                'type' => 'GET', //request type
                'url' => CController::createUrl('dynamiccities'), //url to call
                'update' => '#Order_receiver_city', //selector to update
                'data' => 'js:"receiver_state="+jQuery(this).val()',
            )));
    ?>
</div>
<div class="input-group space">
    <?php
    $c_default = $model->isNewRecord ? '' : $model->receiver_city;
    if (!$model->isNewRecord) {
        $city_data = Area::model()->findAll("parent_id=:parent_id",
            array(":parent_id" => $model->receiver_state));
        $city = CHtml::listData($city_data, "area_id", "name");
    }
    $city_update = $model->isNewRecord ? array() : $city;
    echo $form->labelEx($model, 'receiver_city', array('class' => 'input-group-addon'));
    echo CHtml::dropDownList('Order[receiver_city]', $c_default, $city_update,
        array(
            'class' => 'form-control form-control1',
                'empty' => '请选择城市',
            'ajax' => array(
                'type' => 'GET', //request type
                'url' => CController::createUrl('dynamicdistrict'), //url to call
                'update' => '#Order_receiver_district', //selector to update
                'data' => 'js:"receiver_city="+jQuery(this).val()',
            )));
    ?>
</div>
<div class="input-group space">
    <?php
    $d_default = $model->isNewRecord ? '' : $model->receiver_district;
    if (!$model->isNewRecord) {
        $district_data = Area::model()->findAll("parent_id=:parent_id",
            array(":parent_id" => $model->receiver_city));
        $district = CHtml::listData($district_data, "area_id", "name");
    }
    $district_update = $model->isNewRecord ? array() : $district;
    echo $form->labelEx($model, 'receiver_district', array('class' => 'input-group-addon'));
    echo CHtml::dropDownList('Order[receiver_district]', $d_default, $district_update,
        array(
            'class' => 'form-control form-control1',
                'empty' => '请选择地区',
        )
    );
    ?>
</div>

<div class="input-group space">
    <?php echo $form->labelEx($model, 'receiver_zip', array('class' => 'input-group-addon')); ?>
    <?php echo $form->textField($model, 'receiver_zip', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
</div>

<div class="input-group space">
    <?php echo $form->labelEx($model, 'receiver_address', array('class' => 'input-group-addon')); ?>
    <?php echo $form->textField($model, 'receiver_address', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control form-control1')); ?>
</div>

<div class="input-group space">
    <?php echo $form->labelEx($model, 'receiver_mobile', array('class' => 'input-group-addon')); ?>
    <?php echo $form->textField($model, 'receiver_mobile', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
</div>

<div class="input-group space">
    <?php echo $form->labelEx($model, 'receiver_phone', array('class' => 'input-group-addon')); ?>
    <?php echo $form->textField($model, 'receiver_phone', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
</div>


