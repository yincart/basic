<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'ad-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5')); ?>
    <div class="control-group">
        <label class="control-label required" for="Ad_pic">图片<span class="required">*</span></label>

        <div class="controls">
            <?php $this->widget('ext.elFinder.ServerFileInput', array(
                'model' => $model,
                'attribute' => 'pic',
                'filebrowserBrowseUrl' => Yii::app()->createUrl('mall/elfinder/view'),
            )); ?>
        </div>
    </div>
<?php echo $form->textFieldControlGroup($model, 'url', array('class' => 'span5')); ?>
<?php
$data = Theme::model()->findAll();
$list = CHtml::listData($data, 'theme', 'name');
echo $form->dropDownListControlGroup($model, 'theme', $list); ?>
<?php echo $form->textAreaControlGroup($model, 'content', array('class' => 'span8', 'rows' => 5)); ?>
<?php echo $form->textFieldControlGroup($model, 'sort_order'); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>