<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'htmlOptions' => array(
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data',
    ),
    'enableAjaxValidation' => true,
));
if ($model->hasErrors()): ?>
    <div class="control-group">
        <?php echo $form->errorSummary($model); ?>
    </div>
<?php endif; ?>
<div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>
<?php
$parent_id = $model->isNewRecord ? 0 : $model->parent()->find()->category_id;
$data = Category::model()->getSelectOptions(3);
echo TbHtml::dropDownListControlGroup('Category[node]', $parent_id, $data, array('label' => 'Parent Category'));
echo $form->textFieldControlGroup($model, 'name');
echo $form->inlineRadioButtonListControlGroup($model, 'label', $model->getLabelList());
echo $form->textFieldControlGroup($model, 'url');
?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'pic', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $this->widget('ext.elFinder.ServerFileInput', array(
                'model' => $model,
                'attribute' => 'pic',
                'connectorRoute' => 'mall/elfinder/connector',
            )
        );
        ?>
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
