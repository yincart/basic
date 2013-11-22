<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->textFieldRow($model,'id'); ?>

<?php echo $form->textFieldRow($model,'username',array('size'=>20,'maxlength'=>20)); ?>

<?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>

<?php echo $form->textFieldRow($model,'activkey',array('size'=>60,'maxlength'=>128)); ?>

<?php echo $form->textFieldRow($model,'create_at'); ?>

<?php echo $form->textFieldRow($model,'lastvisit_at'); ?>

<?php echo $form->dropDownListRow($model,'superuser',$model->itemAlias('AdminStatus')); ?>

<?php echo $form->dropDownListRow($model,'status',$model->itemAlias('UserStatus')); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType' => 'submit',
	'type'=>'primary',
	'label'=>'Search',
)); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
