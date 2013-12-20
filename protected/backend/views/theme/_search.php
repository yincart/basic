<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <p>theme:</p>
	<?php echo $form->textField($model,'theme',array('class'=>'span5','maxlength'=>50)); ?>
    <p>name:</p>
	<?php echo $form->textField($model,'name',array('class'=>'span5','maxlength'=>45)); ?>
    <p>author:</p>
	<?php echo $form->textField($model,'author',array('class'=>'span5','maxlength'=>45)); ?>
    <p>site:</p>
	<?php echo $form->textField($model,'site',array('class'=>'span5','maxlength'=>100)); ?>
    <p>update_url:</p>
	<?php echo $form->textField($model,'update_url',array('class'=>'span5','maxlength'=>100)); ?>
    <p>desc:</p>
	<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    <p>config:</p>
	<?php echo $form->textArea($model,'config',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    <p>create_time:</p>
	<?php echo $form->textField($model,'create_time',array('class'=>'span5')); ?>
    <p>update_time:</p>
	<?php echo $form->textField($model,'update_time',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Search',array(
            'type'=>'primary',
        )); ?>
	</div>

<?php $this->endWidget(); ?>
