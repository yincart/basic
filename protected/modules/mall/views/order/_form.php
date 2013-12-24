<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'order-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>


    <?php echo $form->labelEx($model,'order_id'); ?>
    <?php echo $form->textField($model,'order_id',array('size'=>20,'maxlength'=>20)); ?>
    <?php echo $form->error($model,'order_id'); ?>

    <?php echo $form->labelEx($model,'user_id'); ?>
    <?php echo $form->textField($model,'user_id' ); ?>
    <?php echo $form->error($model,'user_id'); ?>

    <?php echo $form->labelEx($model,'status'); ?>
    <?php echo $form->dropdownlist($model,'status'  ,array('0'=>'未支付','1'=>'已支付'));?>
    <?php echo $form->error($model,'status'); ?>

    <?php echo $form->labelEx($model,'pay_status'); ?>
    <?php echo $form->dropdownlist($model,'pay_status' ,array('0'=>'待付款','1'=>'已付款')); ?>
    <?php echo $form->error($model,'pay_status'); ?>

    <?php echo $form->labelEx($model,'ship_status'); ?>
    <?php echo $form->dropdownlist($model,'ship_status'  ,array('0'=>'未发货','1'=>'已发货')); ?>
    <?php echo $form->error($model,'ship_status'); ?>

    <?php echo $form->labelEx($model,'refund_status'); ?>
    <?php echo $form->dropdownlist($model,'refund_status'  ,array('0'=>'未退货','1'=>'已退货')); ?>
    <?php echo $form->error($model,'refund_status'); ?>

    <?php echo $form->labelEx($model,'ship_method'); ?>
    <?php echo $form->dropdownlist($model,'ship_method' , array('1'=>'平邮','2'=>'快递' ,'3'=>'EMS')); ?>
    <?php echo $form->error($model,'ship_method'); ?>

    <?php echo $form->labelEx($model,'ship_fee'); ?>
    <?php echo $form->textField($model,'ship_fee',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->error($model,'ship_fee'); ?>

    <?php echo $form->labelEx($model,'pay_fee'); ?>
    <?php echo $form->textField($model,'pay_fee',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->error($model,'pay_fee'); ?>

    <?php echo $form->labelEx($model,'total_fee'); ?>
    <?php echo $form->textField($model,'total_fee',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->error($model,'total_fee'); ?>

    <?php echo $form->labelEx($model,'pay_method'); ?>
    <?php echo $form->dropdownlist($model,'pay_method' , array('0'=>'财付通','1'=>'银行卡')); ?>
    <?php echo $form->error($model,'pay_method'); ?>

    <?php echo $form->labelEx($model,'receiver_name'); ?>
    <?php echo $form->textField($model,'receiver_name',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_name'); ?>

    <?php echo $form->labelEx($model,'receiver_country'); ?>
    <?php echo $form->textField($model,'receiver_country',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_country'); ?>

    <?php echo $form->labelEx($model,'receiver_state'); ?>
    <?php echo $form->textField($model,'receiver_state',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_state'); ?>

    <?php echo $form->labelEx($model,'receiver_city'); ?>
    <?php echo $form->textField($model,'receiver_city',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_city'); ?>

    <?php echo $form->labelEx($model,'receiver_district'); ?>
    <?php echo $form->textField($model,'receiver_district',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_district'); ?>

    <?php echo $form->labelEx($model,'receiver_address'); ?>
    <?php echo $form->textField($model,'receiver_address',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->error($model,'receiver_address'); ?>

    <?php echo $form->labelEx($model,'receiver_zip'); ?>
    <?php echo $form->textField($model,'receiver_zip',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_zip'); ?>

    <?php echo $form->labelEx($model,'receiver_mobile'); ?>
    <?php echo $form->textField($model,'receiver_mobile',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_mobile'); ?>

    <?php echo $form->labelEx($model,'receiver_phone'); ?>
    <?php echo $form->textField($model,'receiver_phone',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'receiver_phone'); ?>

    <?php echo $form->labelEx($model,'memo'); ?>
    <?php echo $form->textArea($model,'memo',array('rows'=>6, 'cols'=>50)); ?>
    <?php echo $form->error($model,'memo'); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    )); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->