<?php $action=$model->getIsNewRecord() ? 'Create' : 'Update';?>
<h1><?php echo TranslateModule::t(($action) . ' Message')." # ".$model->id." - ".TranslateModule::translator()->acceptedLanguages[$model->language]; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->hiddenField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->hiddenField($model,'language',array('size'=>16,'maxlength'=>16)); ?>
    
    <div class="row">
        <?php echo $form->label($model->source,'category'); ?>
        <?php echo $form->textField($model->source,'category',array('disabled'=>'disabled')); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model->source,'message'); ?>
        <?php echo $form->textField($model->source,'message',array('disabled'=>'disabled')); ?>
    </div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'translation'); ?>
		<?php echo $form->textArea($model,'translation',array('rows'=>2, 'cols'=>80)); ?>
		<?php echo $form->error($model,'translation'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(TranslateModule::t($action)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->