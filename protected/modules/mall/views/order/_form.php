<link type="text/css" rel="stylesheet"
      href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css"/>
<div class="orderform">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-form',
        'enableAjaxValidation' => false,
//        'method'=>'GET'
    )); ?>

    <div class="input-group space">
        <?php if ($model->order_id) {
            echo $form->labelEx($model, 'order_id', array('class' => 'input-group-addon'));
            echo $form->textField($model, 'order_id', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control form-control1', 'readOnly' => true));
        }?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'user_id', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'user_id', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control form-control1', 'readOnly' => true));
        ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'total_fee', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'total_fee', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control form-control1')); ?>
        <div id="add_goods" class="btn btn-info" style="float:right">添加物品</div>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'pay_status', array('class' => 'input-group-addon')); ?>
        <?php echo $form->dropdownlist($model, 'pay_status', array('0' => '未支付', '1' => '已付款'),
            array(
                'class' => 'form-control form-control1',
//                'ajax' => array(
//                    'type' => 'GET', //request type
//                    'url' => CController::createUrl('dynamicpay_status'), //url to call
//                    'update' => '#Order_payment_method_id,#Order_shipping_method_id', //selector to update
//                    'data' => 'js:"pay_status="+jQuery(this).val()',
//                )
            ));
        ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'payment_method_id', array('class' => 'input-group-addon')); ?>
        <?php echo $form->dropdownlist($model, 'payment_method_id', array('0' => '请选择', '1' => '支付宝', '2' => '银行卡'), array('class' => 'form-control form-control1')); ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'pay_fee', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'pay_fee', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control form-control1')); ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'shipping_method_id', array('class' => 'input-group-addon')); ?>
        <?php echo $form->dropdownlist($model, 'shipping_method_id', array('' => '请选择', '1' => '平邮', '2' => '快递', '3' => 'EMS'), array('class' => 'form-control form-control1')); ?>
        <?php echo $form->error($model, 'shipping_method_id', array('style' => 'color:red;float:right')); ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'ship_fee', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'ship_fee', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control form-control1')); ?>
    </div>

    <div style="float:left"> 联系方式：</div>

    <div style="clear:left"></div>

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
//                'empty' => '请选择省份',
                'ajax' => array(
                    'type' => 'GET', //request type
                    'url' => CController::createUrl('dynamiccities'), //url to call
                    'update' => '#Order_receiver_city', //selector to update
                    'data' => 'js:"receiver_state="+jQuery(this).val()',
                )));
        ?>
    </div>
    <div class="input-group">
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
//                'empty' => '请选择城市',
                'ajax' => array(
                    'type' => 'GET', //request type
                    'url' => CController::createUrl('dynamicdistrict'), //url to call
                    'update' => '#Order_receiver_district', //selector to update
                    'data' => 'js:"receiver_city="+jQuery(this).val()',
                )));
        ?>
    </div>
    <div class="input-group">
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
//                'empty' => '请选择地区',
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
        <?php echo $form->labelEx($model, 'receiver_name', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'receiver_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'receiver_mobile', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'receiver_mobile', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'receiver_phone', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textField($model, 'receiver_phone', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control form-control1')); ?>
    </div>

    <div class="input-group space">
        <?php echo $form->labelEx($model, 'memo', array('class' => 'input-group-addon')); ?>
        <?php echo $form->textArea($model, 'memo', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    </div>

    <div class="form-actions space" style="width: 65%">
        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
    </div>
    <iframe style="width:500px" scrolling="yes" src="<?php echo $this->createUrl('order/add_goods') ; ?>"></iframe>
    <?php $this->endWidget(); ?>
    <div class="item-form">

        <?php $this->renderPartial('itemView', array(
'order_item'=>$order_item,
        )); ?>
    </div>
</div><!-- form -->
<style>
    .orderform {
        width: 40%;
        text-align: center;
        margin-right: auto;
        margin-left: auto;
    }

    .input-group-addon {
        height: 40px;
        width: 90px !important;
    }

    .form-control1 {
        height: 40px !important;
        width: 343px !important;
    }

    .space {
        margin-top: 15px;
    }
    .overlay-popup{
        width:100%;
        height:100%;
        background-color:#000;
        opacity:0.3;
        filter:alpha(opacity=30);
        position:fixed;
        top:0;
        left:0;
        z-index:2000;
    }
    .popup-container{
        width:1000px;
        height:500px;
        margin-top:-250px;
        margin-left:-500px;
        position:fixed;
        top:50%;
        left:50%;
        z-index:3000;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:10px;
        padding:25px 0 0 0;
    }
    .popup-container .close{
        position:absolute;
        right:15px;
        top:10px;
    }
   .popup-iframe{
       display:block;margin:20px auto;
width:90%;
       height: 90%;
    }

</style>
<script>
    $(document).ready(function () {
        $('#add_goods').click(function () {
            showPopup('<?php echo $this->createUrl('order/add_goods') ; ?>');
        });
    });
    function showPopup(url){
        var $popup = $('#overlay-popup');
        if($popup.length){ // if popup has existed, use it
            $popup.show();
        }else{ // if popup has not been created, create it
            $popup = $('<div id="overlay-popup"><div class="overlay-popup"></div><div class="popup-container"><b class="close">X</b><iframe class="popup-iframe" src="' + url + '"></iframe></div></div>').appendTo('body')
                .on('click', '.close', function(){
                    $(this).parent().parent().hide();
                });
        }
    }
</script>