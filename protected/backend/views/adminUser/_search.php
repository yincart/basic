<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'username',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldControlGroup($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldControlGroup($model,'profile',array('class'=>'span5','maxlength'=>128)); ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));
    ?>

<?php $this->endWidget(); ?>
