<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'ad-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5'));?>
<?php echo $form->fileFieldRow($model, 'pic', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'url', array('class' => 'span5')); ?>
<?php 
$data = Theme::model()->findAll();
$list = CHtml::listData($data, 'theme', 'name');
echo $form->dropDownListRow($model, 'theme', $list); ?>
<?php echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5)); ?>
<?php echo $form->textFieldRow($model, 'sort_order'); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>