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
<div class="control-group">
    <?php echo $form->labelEx($model, 'node', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $parent_id = 0;
        if (!$model->isNewRecord) {
            $node = Category::model()->findByPk($model->id);
            $parent = $node->parent()->find();
            $parent_id = $parent->id;
        }
        $descendants = Category::model()->findAll(array('condition' => 'root=3', 'order' => 'lft'));
        $data = Category::model()->getSelectOptions($descendants);
        echo CHtml::dropDownList('Category[node]', $parent_id, $data);
        echo $form->error($model, 'node');
        ?>
    </div>
</div>

<?php
echo $form->textFieldControlGroup($model, 'name');
echo $form->inlineRadioButtonListControlGroup($model, 'label', $model->attrLabelHtml());
echo $form->textFieldControlGroup($model, 'url');
?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'pic', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        echo CHtml::image(Yii::app()->request->baseUrl . '/upload/category/' . $model->pic, '', array('style'=>'width:100px;padding-right:10px'));
        echo $form->fileField($model, 'pic');
        ?>
    </div>
</div>
<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton('Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
));
$this->endWidget(); ?>
