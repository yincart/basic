<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php
echo $form->errorSummary($model);

if (!$model->isNewRecord) {
    $category_check = Category::model()->findByPk($model->id);
    $parent = $category_check->parent()->find();
}
echo '<select id="Category_node" name="Category[node]">';

$descendants = Category::model()->findAll(array('condition' => 'root=3', 'order' => 'left'));
$level = 1;
foreach ($descendants as $child) {
    $string = '&nbsp;&nbsp;';
    $string .= str_repeat('&nbsp;&nbsp;', 2 * ($child->level - $level));
//    if ($child->isLeaf() && !$child->next()->find()) {
//        $string .= '';
//    } else {
//
//        $string .= '';
//    }
    $string .= '' . $child->name;
//		echo $string;
    if (!$model->isNewRecord) {
        if ($parent->id == $child->id) {
            $selected = 'selected';

            echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
        } else {
            echo '<option value="' . $child->id . '" >' . $string . '</option>';
        }
    } else {
        echo '<option value="' . $child->id . '" >' . $string . '</option>';
    }
}
echo '</select>';
?>

<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->radioButtonListControlGroup($model, 'label', array(
    '1' => '<span class="label label-info">New</span>',
    '2' => '<span class="label label-important">Hot!</span>',
))?>

<?php echo $form->textFieldControlGroup($model, 'url', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->fileFieldControlGroup($model, 'pic'); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>
