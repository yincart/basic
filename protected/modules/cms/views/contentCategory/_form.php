<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php
if (!$model->isNewRecord) {
//    $category_check = Category::model()->findByPk($model->category_id);
    $parent = $model->parent()->find();
}
echo '<select id="Category_node" name="Category[node]">';
$descendants = Category::model()->findAll(array('condition' => 'root=1'));
$level = 1;
foreach ($descendants as $child) {
    $string = '&nbsp;&nbsp;';
    $string .= str_repeat('&nbsp;&nbsp;', 2*($child->level - $level));
//    if ($child->isLeaf() && !$child->next()->find()) {
//        $string .= '&nbsp;&nbsp;';
//    } else {
//
//        $string .= '';
//    }
    $string .= $child->name;
//		echo $string;
    if (!$model->isNewRecord) {
        if ($parent->category_id == $child->category_id) {
            $selected = 'selected';

            echo '<option value="' . $child->category_id . '" selected="' . $selected . '">' . $string . '</option>';
        } else {
            echo '<option value="' . $child->category_id . '" >' . $string . '</option>';
        }
    } else {
        echo '<option value="' . $child->category_id . '" >' . $string . '</option>';
    }
}
echo '</select>';
?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>
