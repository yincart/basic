<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->textFieldControlGroup($model,'id'); ?>

<?php echo $form->textFieldControlGroup($model,'username',array('size'=>20,'maxlength'=>20)); ?>

<?php echo $form->textFieldControlGroup($model,'email',array('size'=>60,'maxlength'=>128)); ?>

<?php echo $form->textFieldControlGroup($model,'activkey',array('size'=>60,'maxlength'=>128)); ?>

<?php echo $form->textFieldControlGroup($model,'create_at'); ?>

<?php echo $form->textFieldControlGroup($model,'lastvisit_at'); ?>

<?php echo $form->dropDownListControlGroup($model,'superuser',$model->itemAlias('AdminStatus')); ?>

<?php echo $form->dropDownListControlGroup($model,'status',$model->itemAlias('UserStatus')); ?>

<div class="form-actions">
<?php //$this->widget('bootstrap.widgets.TbButton', array(
//	'buttonType' => 'submit',
//	'type'=>'primary',
//	'label'=>'Search',
echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
));
//)); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
