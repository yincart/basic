<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'theme-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <p>theme:</p>
	<?php echo $form->textField($model,'theme',array('class'=>'span5','maxlength'=>50, 'hint'=>'和www/themes目录的名称一样')); ?>
    <p>name:</p>
	<?php echo $form->textField($model,'name',array('class'=>'span5','maxlength'=>45)); ?>
    <p>author:</p>
	<?php echo $form->textField($model,'author',array('class'=>'span5','maxlength'=>45)); ?>
    <p>site:</p>
	<?php echo $form->textField($model,'site',array('class'=>'span5','maxlength'=>100)); ?>
    <p>update_url:</p>
	<?php echo $form->textField($model,'update_url',array('class'=>'span5','maxlength'=>100)); ?>
    <p>config:</p>
	<?php echo $form->textArea($model,'config',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
<!--		--><?php //$this->widget('bootstrap.widgets.TbButton', array(
//			'buttonType'=>'submit',
//			'type'=>'primary',
//			'label'=>$model->isNewRecord ? 'Create' : 'Save',
//		)); ?>
        <?php $label=$model->isNewRecord ? 'Create' : 'Save' ?>
        <?php echo CHtml::submitButton($label,array(
            'type'=>'primary',
        ))?>
	</div>

<?php $this->endWidget(); ?>
