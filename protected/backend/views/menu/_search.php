<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'root',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'lft',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'rgt',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'level',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'pic',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'if_show',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
