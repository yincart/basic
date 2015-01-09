<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'htmlOptions' => array(
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data',
    ),
    'enableAjaxValidation' => false,
    'enableClientValidation'=>true,
));
if ($model->hasErrors()): ?>
    <div class="control-group">
        <?php echo $form->errorSummary($model); ?>
    </div>
<?php endif; ?>
<div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>
<?php
$parent_id = $model->isNewRecord ? 0 : $model->parent()->find()->category_id;
$data = Category::model()->getSelectOptions(3, true);
echo TbHtml::dropDownListControlGroup('Category[node]', $parent_id, $data, array('label' => '上级分类'));
echo $form->textFieldControlGroup($model, 'name');
echo $form->inlineRadioButtonListControlGroup($model, 'label', $model->getLabelList());
echo $form->textFieldControlGroup($model, 'url');
//echo $form->fileFieldControlGroup($model, 'pic');
?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'pic', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php $this->widget('ext.elFinder.ServerFileInput', array(
            'model' => $model,
            'attribute' => 'pic',
            'filebrowserBrowseUrl' => Yii::app()->createUrl('catalog/elfinder/view'),
        )); ?>
    </div>
</div>
<?php
if (!$is_view) {
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));
}
$this->endWidget(); ?>
