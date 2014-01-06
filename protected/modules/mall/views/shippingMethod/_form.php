<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipping-method-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->dropDownList($model,'enabled', array('1'=>'启用', '0'=>'禁用')); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'is_cod'); ?>
		<?php echo $form->dropDownList($model,'is_cod', array('1'=>'是', '0'=>'否')); ?>
		<?php echo $form->error($model,'is_cod'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>


    <div class="form-actions">
        <?php  echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->