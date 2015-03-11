<?php
/* @var $this StoreController */
/* @var $model Store */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'store-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5')); ?>
		<?php echo $form->dropDownListControlGroup($model,'vip', array('0'=>'否', '1'=>'是')); ?>
        <?php echo $form->textFieldControlGroup($model,'url',array('class'=>'span5')); ?>
    <div class="control-group">
        <label class="control-label required" for="Ad_pic">Logo<span class="required">*</span></label>

        <div class="controls">
            <?php $this->widget('ext.elFinder.ServerFileInput', array(
                'model' => $model,
                'attribute' => 'logo',
                'filebrowserBrowseUrl' => Yii::app()->createUrl('core/elfinder/view'),
            )); ?>
        </div>
    </div>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->